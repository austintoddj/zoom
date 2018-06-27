<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @yield('content')

    @if(!empty(config('analytics.google.tracking')))
        <!-- Google Analytics -->
        @include('frontend.components.analytics.tracking')
    @endif

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>