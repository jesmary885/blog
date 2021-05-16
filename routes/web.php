<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;

//Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/', function(){
    return"Hola mundo";
});

Route::get('posts/{post}', [PostController::class,'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class,'category'])->name('posts.category');

Route::get('tag/{tag}' , [PostController::class,'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*Route::get('/auth/redirect', function ($driver) {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/callback', function ($driver) {
    $user = Socialite::driver('facebook')->user();

    // $user->token
});*/


Route::get('login/{driver}', [LoginController::class,'redirectToProvider'])->name('login.driver');
Route::get('login/{driver}/callback', [LoginController::class,'handleProviderCallback']);

/*Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');*/
