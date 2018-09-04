<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ url('https://fonts.gstatic.com') }}">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Nunito') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @yield('content')

    <!-- Google Analytics -->
    @if(!empty(config('analytics.google.tracking')))
        @include('public.components.analytics.tracking')
    @endif
</body>
</html>