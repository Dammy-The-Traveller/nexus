<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
         // if we want to see all attribute from that form we can run this 
        // dd(request()->all());

        // validate
        $attributes = request()->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);
        // attempt to login the user
       if( !Auth::attempt($attributes)){

        throw ValidationException::withMessages([

            'email'=> 'Sorry, those credentials are invalid'
        ]);
       };
        // regenerate the session token
        request()->session()->regenerate();
        // redirect
        return redirect('/jobs');
    }

    public function destroy(){
        // if we want to see all attribute from that form we can run this 
        //dd('log out');
        Auth::logout();
        return redirect('/');
   }
}
