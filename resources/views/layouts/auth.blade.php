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
<div class="container my-5 text-center">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/laravel-zoom.svg') }}" alt="Laravel Zoom Logo" height="40">
    </a>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>