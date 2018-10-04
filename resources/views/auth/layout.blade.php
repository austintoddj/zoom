@extends('layouts.app')

@push('scripts')
    @if(!empty(config('analytics.google.tracking')))
        @include('public.components.analytics.tracking')
    @endif
    <script src="{{ asset('js/auth.js') }}" defer></script>
    <script defer src="{{ url('https://use.fontawesome.com/releases/v5.3.1/js/all.js') }}" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
@endpush

@push('styles')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('body')
    <main class="py-4">
        <div class="container text-center mt-4 mb-5">
            <h3 class="text-muted"><a href="{{ route('public.home') }}" class="text-muted" style="text-decoration: none"><i class="fa fa-fw fa-bolt"></i> {{ config('app.name') }}</a></h3>
        </div>

        @yield('content')
    </main>
@endsection