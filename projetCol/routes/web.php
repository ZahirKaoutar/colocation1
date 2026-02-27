<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class,'Login'])->name('login');
Route::get('register',[AuthController::class,'Register']);

Route::post('loginSubmit',[AuthController::class,'SubmitLogin'])->name('loginSubmit');
Route::post('registerSubmit',[AuthController::class,'RegisterSubmit'])->name('registerSubmit');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
 Route::get('dashbordmembre',[DashbordController::class,'dashbordmembre'])->name('dashbordmembre');
Route::resource('colocations',ColocationController::class);






// Route::post('colocation/{colocation}/invite', [InvitationController::class, 'sendInvitation'])->name('invitation.send');
// Route::get('invitation/accept/{token}', [InvitationController::class, 'acceptInvitation'])->name('invitation.accept');
// Route::get('invitation/refuse/{token}', [InvitationController::class, 'refuseInvitation'])->name('invitation.refuse');



// Formulaire pour envoyer invitation → POST
Route::post('colocation/{colocation}/invite', [InvitationController::class, 'sendInvitation'])->name('invitation.send');

// Cliquer sur mail → GET
Route::get('invitation/accept/{token}', [InvitationController::class, 'acceptInvitation'])->name('invitation.accept');
Route::get('invitation/refuse/{token}', [InvitationController::class, 'refuseInvitation'])->name('invitation.refuse');




// Route::get('/test-mail', function() {
//     Mail::to('test@example.com')->send(new InvitationMail($colocation, $owner, $invitation));
//     return 'Mail envoyé !';
// });


Route::get('/debug-mail', function () {
    try {
        Mail::raw('Hadi risala mn Laravel!', function ($message) {
            $message->to('ton-email@gmail.com')->subject('Test Technique');
        });
        return "L'email daz l Mailtrap! Chouf l-inbox dialek.";
    } catch (\Exception $e) {
        return "Baqa l-erreur: " . $e->getMessage();
    }
});
