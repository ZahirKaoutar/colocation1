<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function Login(){
    return view('auth.login');
 }
 public function SubmitLogin(LoginRequest $request){
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {


        if (auth()->user()->banned_at) {
            Auth::logout();
            return back()->withErrors(['email' => 'Votre compte est banni']);
        }

        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect'
    ]);

 }
 public function Register(){
    return view('auth.Register');
 }
 public function RegisterSubmit(RegisterRequest $request){

  $role=User::count()===0?'admin':'user';
     $user=User::create([
    'name'=>$request->name,
       'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>$role,
        'reputation'=>0,
        'banned_at'=>null,
     ]);

   Auth::login($user);
   return redirect()->route('dashboard');


  }
  public function logout()
{
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');

 }
}
