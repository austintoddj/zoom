<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    @stack('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Style sheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset(mix(\Zoom\Zoom::$useDarkMode ? 'css/app-dark.css' : 'css/app.css', 'vendor/zoom')) }}">

    <!-- Additional style sheets -->
    @stack('styles')
</head>
<body>
    <div id="app">
        @yield('body')
    </div>

    <!-- Application scripts -->
    <script type="text/javascript" src="{{ mix('js/app.js', 'vendor/zoom') }}"></script>

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
