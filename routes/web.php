<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/register', function(){
        return view('auth.register');
    })->name('register');
    
    Route::get('/login', function(){
        return view('auth.login');
    })->name('login');
    
    Route::post('/registerProcess', [AuthController::class, 'register'])->name('register.process');
    Route::post('/loginProcess', [AuthController::class, 'login'])->name('login.process');
    
});


Route::resource('posts', PostController::class)->middleware('auth');
