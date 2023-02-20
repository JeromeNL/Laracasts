<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required',
            'username'=> 'required|max:255',
            'email' => 'required|email',
            'password' => ['required', 'max:255', 'min:5']
        ]);

        User::create($attributes);

        return redirect('/posts/index');
    }
}
