<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Roboto:wght@300;400;500&display=swap" >

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons-1.7.1/bootstrap-icons.css') }}">
    
        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/game.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <body>
        <div class="container">

        <h1 class="title title-container"><a href="{{ route('login') }}" class="text-decoration-none">Memory<br>game</a></h1>

            <div class="main-panel-container d-flex flex-column align-items-center">
                {{ $slot }}
            </div>


            <div class="left-buttons d-flex flex-column">
                <a class="button" href="{{ route('quickGame') }}">
                    {{ __('Szybka gra') }}
                </a>
                <a class="button" href="{{ route('ranking') }}">
                    {{ __('Ranking') }}
                </a>
            </div>
            
            <div class="sound-button-container">
                <a class="sound-button">
                    <i class="bi bi-volume-up-fill" style="display: none;"></i>
                    <i class="bi bi-volume-mute-fill"></i>
                </a>
            </div>

        </div>
    </body>
</html>
