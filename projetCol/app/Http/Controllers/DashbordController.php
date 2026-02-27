<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Carbon;

use App\Models\Colocation;

use Illuminate\Http\Request;

class DashbordController extends Controller{


// public function dashbordmembre()
// {
//     $user = Auth::user();
//    $scoreReputation = $user->reputation ?? 0;

//     $month = Carbon::now()->month;
//     $year = Carbon::now()->year;


//     $colocationIds = $user->colocations()->pluck('colocations.id');
// $ExpenseGlobale = 0;
// if ($colocationIds->isNotEmpty()) {
//     $ExpenseGlobale = Expense::whereIn('colocation_id', $colocationIds)
//        ->whereMonth('date', $month)
//         ->sum('amount');
// }


//     $recentExpense = Expense::whereIn('colocation_id', $colocationIds)
//         ->latest()
//         ->get();

//     return view('membre.dashboard', compact('ExpenseGlobale', 'recentExpenses', 'scoreReputation'));
// }










public function dashbordmembre()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $scoreReputation = $user->reputation ?? 0;
    $month = Carbon::now()->month;
    $year = Carbon::now()->year;

    $colocationIds = $user->colocations()->pluck('colocations.id');

    $ExpenseGlobale = 0;
    $recentExpense = null;







    if ($colocationIds->isNotEmpty()) {

        $ExpenseGlobale = Expense::whereIn('colocation_id', $colocationIds)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount');

        $recentExpense = Expense::with('payer')
            ->whereIn('colocation_id', $colocationIds)
            ->latest()
            ->first();
    }


// Récupérer la colocation active via la table Membership
$activeMemberships = collect(); // Définit comme une collection vide par défaut

// Récupérer la colocation active via la table Membership
$membershipActive = $user->memberships()
    ->whereNull('left_at')
    ->whereHas('colocation', function($q) {
        $q->where('status', 'active');
    })
    ->first();

if ($membershipActive) {
    // Récupérer tous les membres actifs de la même colocation
    $activeMemberships = $membershipActive->colocation
        ->members()
        ->wherePivot('left_at', null)
        ->get();
}

return view('membre.dashboard', compact(
    'ExpenseGlobale',
    'recentExpense',
    'scoreReputation',
    'activeMemberships',
    'membershipActive'
));


    return view('membre.dashboard', compact(
        'ExpenseGlobale',
        'recentExpense',
        'scoreReputation',
        'activeMemberships',
        'membershipActive'
    ));
}




}
