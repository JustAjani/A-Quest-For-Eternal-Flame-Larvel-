<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\StripePaymentController;

Route::post('/create-checkout-session', [StripePaymentController::class, 'createSession'])->name('create-checkout-session');

Route::get('/', function () {
    return view('Home');
});

Route::get('/New Player Guide', function () {
    return view('New Player Guide');
});

Route::get('/Play', function () {
    return view('Play');
});

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/Market Place', [MerchController::class, 'index']) ->name('Market Place');
Route::get('/Market Place/{id}', [MerchController::class, 'show'])->name('Details');

use App\Http\Controllers\ChatController;
Route::get('/Contacts', function () {
    return view('Contacts');
});

Route::post('/send-message', [ChatController::class, 'sendMessage']);
Route::get('/messages', [ChatController::class, 'fetchMessages']);


