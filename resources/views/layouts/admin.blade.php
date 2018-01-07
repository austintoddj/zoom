<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="mb-5">
<div class="top-bar"></div>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-10 offset-lg-1">
            <div class="d-flex">
                <div class="p-2">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/laravel-zoom.svg') }}" alt="Laravel Zoom Logo" height="33">
                    </a>
                </div>
                <div class="ml-auto p-2">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Helper::gravatar(Auth::user()->email) }}"
                                     alt="{{ Auth::user()->name }} Profile Image"
                                     style="border-radius: 50%; width: 28px">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <h6 class="dropdown-header">Signed in as <strong>{{ Auth::user()->name }}</strong></h6>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('dashboard') }}" class="dropdown-item"
                                   aria-label="Dashboard">Dashboard</a>
                                <a href="{{ route('settings') }}" class="dropdown-item"
                                   aria-label="Settings">Settings</a>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                   aria-label="Log Out">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row mt-4">
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>