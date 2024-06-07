<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Boolfolio')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="shadow-md">
            <nav class="navbar avbar-expand-lg ">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
                        {{-- <img class="profile-img" src="" alt=""> --}}
                      {{-- Benvenuto {{ Auth::user()->name }} --}}
                    </a>
                </div>
            </nav>
        </header>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
