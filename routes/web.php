<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionControler;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::middleware('admin')->group(function () {
    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('input', 'input')->name('input');
        Route::post('input', 'store')->name('store');
        Route::get('data', 'show')->name('data');
    });
     
});


Route::middleware('guest')->group(function () {
    Route::controller(SessionControler::class)->prefix('auth')->name('auth.')->group(function () {
        Route::get('login', 'showLoginForm')->name('login');
        Route::post('login', 'login');
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'register');
    
});
});

Route::middleware('auth')->group(function () {
    Route::post('/auth/logout',[SessionControler::class, 'logout'])->name('auth.logout');
    
});

