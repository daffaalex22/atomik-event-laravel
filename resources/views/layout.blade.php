<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @hasSection('title')
            <title>Kreanesia - @yield('title')</title>
        @else
            <title>Kreanesia</title>
        @endif
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>

        @stack('head')
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{ asset('img/LogoKreanesia.png')}}" width="120" height="40" class="d-inline-block align-bottom" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="/"><span class="fas fa-home"></span> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kupon"><span class="fas fa-leaf"></span> Kupon</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about"><span class="fas fa-receipt"></span> About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
