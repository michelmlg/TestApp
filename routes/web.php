<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaoControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [AcaoControler::class, 'dashboard']);

Route::get('/acao/{symbol}', [AcaoControler::class, 'show'])->name('acao.show');
