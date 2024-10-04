<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaoControler;

Route::get('/', function () {
    return view('web.home');
});

Route::get('/about', function () {
    return view('web.about');
});

Route::get('/dashboard', [AcaoControler::class, 'dashboard']);

Route::get('/acao/{symbol}', [AcaoControler::class, 'show'])->name('acao.show');
