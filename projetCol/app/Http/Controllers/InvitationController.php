<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Colocation;
use App\Models\User;
use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Auth;
class InvitationController extends Controller
{
    public function sendInvitation(Request $request, $colocationId)
    {
        $colocation = Colocation::findOrFail($colocationId);
        $owner = auth()->user();

        // créer l'invitation et générer token
        $token = Str::random(32);

        $invitation = $colocation->invitations()->create([
            'owner_id'=>auth()->user()->id,
            'email' => $request->email,
            'token' => $token,
            'status' => 'pending',
            'colocation_id'=>$colocationId
        ]);

        // envoyer le mail
        Mail::to($request->email)->send(new InvitationMail($colocation, $owner, $invitation));

        return back()->with('success', 'Invitation envoyée !');
    }







    public function acceptInvitation($token)
{
    // 1. Récupérer l’invitation
    $invitation = Invitation::where('token', $token)
        ->where('status', 'pending') // invitation pas encore traitée
        ->firstOrFail();

    // 2. Vérifier si l'utilisateur existe
    $user = User::where('email', $invitation->email)->first();

    if(!$user) {
        // CAS 2 — User n’existe pas
        // Rediriger vers page création compte + acceptation/refus
        return redirect()->route('register')
            ->with('invitation_token', $token);
    }

    // 3. CAS 3 — vérifier si user a déjà une colocation active
    $activeMembership = $user->memberships()
        ->whereNull('left_at')
        ->whereHas('colocation', function($q) {
            $q->where('status', 'active');
        })->first();

    if($activeMembership) {
        // Bloquer l'acceptation
        return redirect()->route('login')
            ->with('error', 'Vous avez déjà une colocation active. Impossible d’accepter cette invitation.');
    }

    // 4. CAS 1 — User existe et libre, on crée la membership
    $membership = $invitation->colocation->members()->attach($user->id,[

        'role' => 'member',
        'joined_at' => now(),
        'left_at' => null,
    ]);

    // 5. Marquer invitation comme acceptée
    $invitation->update(['status' => 'accepted']);

    // 6. Redirection
    return redirect()->route('dashbordmembre')->with('success', 'Vous avez rejoint la colocation !');
}
public function refuseInvitation($token)
{
    // 1. Récupérer l’invitation
    $invitation = Invitation::where('token', $token)
        ->where('status', 'pending') // invitation pas encore traitée
        ->firstOrFail();

    // 2. Mettre à jour le statut en refusé
    $invitation->update([
        'status' => 'refused',
    ]);

    // 3. Redirection avec message
    return redirect()->route('login')->with('info', 'Vous avez refusé l’invitation à rejoindre la colocation.');
}
}
