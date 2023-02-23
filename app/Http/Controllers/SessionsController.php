<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('success', 'Welcome back!');
        }

        //return back()->withErrors(['emails' => 'Could not be verified']);
    }



    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'goodbye!');
    }
}
