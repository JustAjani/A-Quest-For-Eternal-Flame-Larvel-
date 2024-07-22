<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/Market Place', function () {
    return view('Market Place');
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

Route::get('/User', function () {
    return view('User');
});