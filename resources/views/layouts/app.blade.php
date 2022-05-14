<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if (Auth::user()->role_id === 4)
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Home" ? "active" : "" }}" href="{{ route("home") }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Top Up" ? "active" : "" }}" href="{{ route("topup") }}">Top Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Jajan" ? "active" : "" }}" href="{{ route("transaksi") }}">Jajan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Transaksi" ? "active" : "" }}" href="{{ route("data_transaksi") }}">Riwayat Jajan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Topup" ? "active" : "" }}" href="{{ route("data_topup") }}">Riwayat Topup</a>
                            </li>
                            @endif
                            @if (Auth::user()->role_id === 3)
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Home" ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Menu" ? "active" : "" }}" href="{{ route("menu") }}">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Transaksi" ? "active" : "" }}" href="{{ route("data_transaksi") }}">Riwayat Pembelian</a>
                            </li>
                            @endif
                            @if (Auth::user()->role_id === 1)
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Home" ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data User" ? "active" : "" }}" aria-current="page" href="{{ route("data_user") }}">Data User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Transaksi" ? "active" : "" }}" href="{{ route("data_transaksi") }}">Data Transaksi </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Topup" ? "active" : "" }}" href="{{ route("data_topup") }}">Riwayat Topup</a>
                            </li>
                            @endif
                            @if (Auth::user()->role_id === 2)
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Home" ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $page == "Data Topup" ? "active" : "" }}" href="{{ route("data_topup") }}">Riwayat Topup</a>
                            </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
