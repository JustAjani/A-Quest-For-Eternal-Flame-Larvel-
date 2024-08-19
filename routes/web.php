<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\StripePaymentController;


Route::get('/', function () {
    return view('Home');
});

Route::get('/New Player Guide', function () {
    return view('New Player Guide');
});

Route::get('/Play', function () {
    return view('Play');
});

Route::get('/add to cart', function () {
    return view('add to cart');
});

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/Market Place', [MerchController::class, 'index']) ->name('Market Place');
Route::get('/Market Place/{id}', [MerchController::class, 'show'])->name('Details');
Route::post('/add-to-cart/{id}', [MerchController::class, 'addToCart'])->name('add to cart');
Route::post('/clear-cart', [MerchController::class, 'clearCart'])->name('clear-cart');


use App\Http\Controllers\ChatController;
Route::get('/Contacts', function () {
    return view('Contacts');
});

Route::post('/send-message', [ChatController::class, 'sendMessage']);
Route::get('/messages', [ChatController::class, 'fetchMessages']);
Route::post('/delete-message/{id}', [ChatController::class, 'deleteMessage']);

Route::post('/create-checkout-session', [StripePaymentController::class, 'createSession'])->name('create-checkout-session');
Route::get('/checkout/success', function() {
    // Handle successful checkout here
    return view('checkout.success');  
})->name('checkout.success');
Route::get('/checkout/cancel', function() {
    // Handle checkout cancellation here
    return view('checkout.cancel');  
})->name('checkout.cancel');







