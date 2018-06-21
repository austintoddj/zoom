<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('backend.components.layout.navbar')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}"></script>
    @stack('scripts')
</body>
</html>
