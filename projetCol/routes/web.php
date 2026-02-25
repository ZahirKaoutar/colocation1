<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class,'Login']);
Route::get('register',[AuthController::class,'Register']);

Route::post('loginSubmit',[AuthController::class,'SubmitLogin'])->name('loginSubmit');
Route::post('registerSubmit',[AuthController::class,'RegisterSubmit'])->name('registerSubmit');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
