<?php
use App\Http\Controllers\HomeController;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$pageTitle}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    </head>
    <body>

        <nav class="navbar navbar-expand-lg p-3 navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Numo Dash</a>
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">Action</a>
                    <a class="dropdown-item" href="">Another action</a>
                    <a class="dropdown-item" href="">Something else here</a>
                </div>
            </li>
            </ul>
        </div>
        </nav>

        {{$slot}}



        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
    </body>
</html>
