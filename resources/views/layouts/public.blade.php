<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @yield('content')

    @if(!empty(env('GOOGLE_ANALYTICS')))
        <!-- Google Analytics -->
        @include('public.components.analytics.tracking')
    @endif

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
