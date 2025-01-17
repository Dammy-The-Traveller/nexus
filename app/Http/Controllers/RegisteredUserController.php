<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        // if we want to see all attribute from that form we can run this 
       // dd(request()->all());

       // validate
      $attributes= request()->validate([
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', Password::min(6), 'confirmed'],
       // 'password' => ['required', Password::min(6)->letters()->numbers()],
       ]);
       // create the user
      $user = \App\Models\User::create($attributes);
       // log in
       Auth::login($user);
       // redirect somewhere
       return redirect('/jobs');
    }
}
