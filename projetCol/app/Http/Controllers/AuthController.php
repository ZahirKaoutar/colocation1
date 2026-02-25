<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function Login(){
    return view('auth.login');
 }
 public function SubmitLogin(){

 }
 public function Register(){
    return view('auth.Register');
 }
 public function RegisterSubmit(){
    // $user=User::create([
    //     'name'=>$request->name,
    //     'email'=>$request->email,
    //     ''
//     ])
//  }
 }
}
