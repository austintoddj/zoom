<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/toolkit-inverse.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/application.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <nav class="sidebar-nav">
                <div class="sidebar-header">
                    <button class="nav-toggler nav-toggler-md sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
                        <span class="sr-only">Toggle nav</span>
                    </button>
                    <a class="sidebar-brand img-responsive" href="{{ route('dashboard') }}">
                        <span class="icon icon-leaf sidebar-brand-icon"></span>
                    </a>
                </div>

                <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
                    <ul class="nav nav-pills nav-stacked flex-column">
                        <li class="nav-header">Settings</li>
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('dashboard')) active @endif" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('profile')) active @endif" href="{{ route('profile') }}">Your Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('security')) active @endif" href="{{ route('security') }}">Security</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               aria-label="Log Out">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                        <li class="nav-header">Laravel Zoom</li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/austintoddj/laravel-zoom/wiki" target="_blank">
                                Documentation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/austintoddj/laravel-zoom" target="blank">
                                Github
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/austintoddj/laravel-zoom/blob/master/license" target="_blank">
                                License
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/austintoddj/laravel-zoom/releases" target="_blank">
                                Releases
                            </a>
                        </li>
                    </ul>
                    <hr class="visible-xs mt-3">
                </div>
            </nav>
        </div>

        <div class="col-md-9 content">
            <div class="dashhead">
                <div class="dashhead-titles">
                    <h6 class="dashhead-subtitle">Settings</h6>
                    <h2 class="dashhead-title">Dashboard</h2>
                </div>
            </div>

            <hr class="mt-3">

            @yield('content')

        </div>
    </div>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('vendor/js/chart.js') }}"></script>
<script src="{{ asset('vendor/js/tablesorter.min.js') }}"></script>
<script src="{{ asset('vendor/js/toolkit.js') }}"></script>
<script src="{{ asset('vendor/js/application.js') }}"></script>
</body>
</html>
