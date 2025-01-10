<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaoControler;
use App\Http\Middleware\CheckUserRole;

Route::get('/', function () {
    return view('web.home');
});

Route::get('/about', function () {
    return view('web.about');
});

Route::get('/dashboard', [AcaoControler::class, 'dashboard']);

Route::get('/acao/{symbol}', [AcaoControler::class, 'show'])->name('acao.show');


Route::get('/login', function (){
    return view('web.login');
})->name('login');

Route::get('/administration', function (){
    return 'Secret Admin Page';
})->middleware(CheckUserRole::class);
