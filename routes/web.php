<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageAcaoControler;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/link', function () {
    return view('link');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/acao/{symbol}', [PageAcaoControler::class, 'show'])->name('acao.show');