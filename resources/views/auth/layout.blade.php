@extends('layouts.app')

@push('scripts')
    @if(!empty(config('analytics.google.tracking')))
        @include('public.components.analytics.tracking')
    @endif
    <script src="{{ asset('js/auth.js') }}" defer></script>
    <script defer src="{{ url('https://use.fontawesome.com/releases/v5.3.1/js/all.js') }}" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
@endpush

@push('fonts')
    <link rel="dns-prefetch" href="{{ url('https://fonts.gstatic.com') }}">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i') }}}" rel="stylesheet">
@endpush

@push('styles')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('body')
    <main class="py-4">
        <div class="container text-center my-5">
            <h2 class="text-muted"><i class="fa fa-fw fa-bolt"></i> {{ config('app.name') }}</h2>
        </div>

        @yield('content')
    </main>
@endsection