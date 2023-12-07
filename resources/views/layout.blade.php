<?php

    $counter = 1;

    $counter_file = public_path("counter.txt");
    if (!file_exists($counter_file)) {
        touch($counter_file);
        $fp = fopen($counter_file, "r+");
        fwrite($fp, 1);
        fclose($fp);
    } else {
        $fp = fopen($counter_file, "r+");
        $counter = intval(fread($fp, filesize($counter_file)));
        fclose($fp);

        $counter++;
    }
?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Mochamad Haikal Ghiffari" />

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
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/web.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        @stack('head')
    </head>

    <body>
        <div>
            <nav class="navbar navbar-expand-lg shadow sticky-top" style="background-color: #FFFFFF;">
                <div class="container-fluid">
                    <a class="navbar-brand px-4" href="/">
                        <img src="{{ asset('img/KreanesiaOnlyDark.png')}}" width="120" height="40" class="d-inline-block align-bottom" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav nav-pills ms-auto mb-2 mb-lg-0 px-4">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/"><span class="fas fa-home"></span> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('kupon')) ? 'active' : '' }}" href="/kupon"><span class="fas fa-receipt"></span> Kupon</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>

        <div>
            <p class="counter"> Visited {{ $counter }} times</p>
        </div>
    </body>
</html>


<?php
    $fp = fopen(public_path("counter.txt"), "w"); 
    fwrite($fp, $counter);
    fclose($fp); 
?>