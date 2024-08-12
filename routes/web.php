<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchController;

Route::get('/', function () {
    return view('Home');
});

Route::get('/New Player Guide', function () {
    return view('New Player Guide');
});

Route::get('/Play', function () {
    return view('Play');
});

Route::get('/Contacts', function () {
    return view('Contacts');
});

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/Market Place', [MerchController::class, 'index']) ->name('Market Place');

