<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentController;
use MailchimpMarketing\ApiClient;


Route::get('ping', function(){
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apikey' => 'acf6e35352dd1036669b41ccf811ff60-us21',
        'server' => 'us21'
    ]);

    $response = $mailchimp->ping->get();
    //dd($response);
    return('hello!');

});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

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


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');



Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


























