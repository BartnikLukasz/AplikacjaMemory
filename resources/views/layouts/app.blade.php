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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">

        <div class="container">

            <a href="{{ route('login') }}" class="title-container text-decoration-none"><h1 class="title">Memory<br>game</h1></a>

            <div class="main-panel-container d-flex flex-column align-items-center">
                {{ $slot }}
            </div>


            {{-- @if (Route::has('instant-game')) --}} <!--Laravel Comment {{-- --}} -->
            <div class="left-buttons d-flex flex-column">
                <!-- <a class="button" href="{{--{{ route('instant-game') }}--}}"> -->
                <a class="button" >
                    Szybka gra
                </a>
                {{-- @endif --}}
                <a class="button" href="{{ route('ranking') }}">
                    Ranking
                </a>
            </div>
            
            <div class="sound-button-container">
                <a class="sound-button">
                    <i class="bi bi-volume-up-fill"></i>
                </a>
            </div>

        </div>
    </body>
</html>
