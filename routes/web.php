<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/link', function () {
    return view('link');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
