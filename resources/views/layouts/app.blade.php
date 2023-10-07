<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'API Sillion') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text">
                <div class="logo-image-small d-flex justify-content-center">
                    <img src="{{asset('/img/logo-sillion.png')}}" style="width: 150px;">
                </div>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                @auth
                    <li class="active ">
                        <a href="{{ route('home') }}">
                            <h5>Lista de Clientes</h5>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>

                <div class="justify-content-end" id="navigation">
                    @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                    @endauth
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="row">
                @yield('content')
                @yield('user-content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="content text-center"><h5>Dashboard Sillion - Consumindo a API Radom Data</h5></div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
