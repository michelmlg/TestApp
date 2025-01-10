<?php
use App\Http\Controllers\HomeController;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$pageTitle}}</title>

        @include('web.layout.head')
        

    </head>
    <body>
        <nav class="navbar navbar-expand-md p-3 navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Numo Dash</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto order-md-1 order-0">
                <li class="nav-item border border-2 border-light rounded" style="padding-left: 2rem; padding-right: 2rem; border-color: #b3c0d1 !important; margin-right: 1rem;">
                    <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                </li>
            </ul>
        </div>
        </nav>

        {{$slot}}


        
        
    </body>
</html>
