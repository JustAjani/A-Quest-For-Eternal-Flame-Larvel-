<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ImageGeneratorController;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('Home');
});

Route::get('/New Player Guide', function () {
    return view('New Player Guide');
});

Route::get('/external-project', function() {
    return redirect()->away('http://text-base-rpg.local/1.The_Quest_for_the_Eternal_Flame.php');
});

Route::get('/add to cart', function () {
    return view('add to cart');
});

Route::get('/image_form', function () {
    return view('imageGen.image_form');
});

Route::get('/image_result', function () {
    return view('imageGen.image_result');
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
Route::get('/search', [MerchController::class, 'search'])->name('search.items');

Route::get('/Contacts', function () {
    return view('Contacts');
});

Route::post('/send-message', [ChatController::class, 'sendMessage']);
Route::get('/messages', [ChatController::class, 'fetchMessages']);
Route::post('/delete-message/{id}', [ChatController::class, 'deleteMessage']);

Route::post('/create-checkout-session', [StripePaymentController::class, 'createSession'])->name('create-checkout-session');
Route::get('/checkout/success', function() {
    return view('checkout.success');  
})->name('checkout.success');
Route::get('/checkout/cancel', function() {
    return view('checkout.cancel');  
})->name('checkout.cancel');

Route::get('/generate-image', [ImageGeneratorController::class, 'showForm'])->name('image.form');
Route::post('/generate-image', [ImageGeneratorController::class, 'generateImage'])->name('generate.image');








