<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaoControler;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/link', function () {
    return view('link');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/acao/{symbol}', [AcaoControler::class, 'show'])->name('acao.show');