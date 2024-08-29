<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::redirect("/","posts")->name('home');

// post routes
Route::resource("posts", PostController::class);


// auth view
Route::middleware('guest')->group(function () {

  

    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');

    Route::post('/register', [UserController::class, 'createUser']);
    Route::post('/login', [UserController::class, 'login'])->name('login');

});

Route::middleware('auth')->group(function () {

    // user controller

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // dashboard controller
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});