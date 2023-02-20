<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function(Category $category){
    return view('/posts.index', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('authors/{author:username}', function(User $author){
    return view('/posts.show', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy']);
