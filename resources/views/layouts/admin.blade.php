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
<body>
<div class="top-bar"></div>
@include('admin.components.nav.navbar')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1">
            @yield('content')
        </div>
    </div>
</div>
<footer class="my-5 text-center text-muted">
    <div class="col-lg-10 offset-lg-1">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="https://github.com/austintoddj/laravel-zoom/wiki" target="_blank">Documentation</a>
            </li>
            <li class="list-inline-item">
                <a href="https://github.com/austintoddj/laravel-zoom" target="blank">Github</a>
            </li>
            <li class="list-inline-item">
                <a href="https://github.com/austintoddj/laravel-zoom/blob/master/license" target="blank">License</a>
            </li>
            <li class="list-inline-item">
                <a href="https://github.com/austintoddj/laravel-zoom/releases" target="blank">Releases</a>
            </li>
        </ul>
        <p>version: {{ Constants::APP_VERSION }}</p>
    </div>
</footer>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>