<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionControler;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::middleware('admin')->group(function () {
    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('input', 'input')->name('input');
        Route::post('input', 'store')->name('store');
        Route::get('data', 'show')->name('data');
        Route::get('pengajuan', 'viewPengajuan')->name('pengajuan');
        Route::put('{pengajuan}/status', 'pengajuan')->name('status');
        Route::get('history', 'viewHistory')->name('history');
    });
     
});

Route::middleware('user')->group(function () {
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('pengajuan', 'viewPengajuan')->name('pengajuan');
        Route::post('pengajuan', 'pengajuan')->name('pengajuan');
        Route::get('riwayat', 'show')->name('riwayat');
        Route::get('tiket', 'ViewTiket')->name('tiket');
        Route::get('{pengajuan}/showtiket', 'ShowTiket')->name('showtiket');
        Route::get('riwayat', 'ShowRiwayat')->name('riwayat');
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

