<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
   $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');



