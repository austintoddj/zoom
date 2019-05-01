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
    <title>Zoom</title>

    <!-- Style sheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset(mix(\App\Zoom::$useDarkMode ? 'css/app-dark.css' : 'css/app.css')) }}">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ mix('favicon.ico') }}">

    <!-- Additional style sheets -->
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('components.nav.navbar')
        @yield('content')
    </div>

    <!-- Application scripts -->
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
