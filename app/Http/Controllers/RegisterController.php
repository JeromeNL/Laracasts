<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|min:5',
            'username'=> 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'max:255', 'min:5']
        ]);

       $user = User::create($attributes);

        // login in user
        auth()->login($user);


        return redirect('/')->with('success', 'Your account has been created.');
    }
}
