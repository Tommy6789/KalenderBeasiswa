<!DOCTYPE html>
<html lang="en">

<style>
    html, body {
    height: 100%; /* Make sure the height is 100% */
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full viewport height */
}

.container {
    flex: 1; /* Ensures the container grows to take up available space */
}

footer {
    position: relative;
    bottom: 0;
    width: 100%;
}

</style>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kalender Beasiswa</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.icon') }}" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox Plugin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core Theme CSS (includes Bootstrap) -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <!-- Option Select -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <style>
        /* Add custom styles for the navbar */
        .navbar-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            /* Ensures navbar stays on top */
            background-color: #add8e6;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand {{ Route::currentRouteName() == 'home' ? '' : 'text-black' }}" href="#page-top">
                Kalender Beasiswa
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @php
                        $isHome = Route::currentRouteName() == 'home';
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('kalender') }}#KalenderBeasiswa">Kalender Beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('proposal.store') }}">Proposal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('wishlist') }}">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('subscriber_login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $isHome ? '' : 'text-black' }}" href="{{ route('kalenderBeasiswa.index') }}">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Adjust spacing for non-home pages -->
    @if (Route::currentRouteName() != 'home')
        <br><br><br>
    @endif

    <!-- Masthead -->
