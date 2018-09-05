@extends('layouts.app')

@push('scripts')
    @if(!empty(config('analytics.google.tracking')))
        @include('public.components.analytics.tracking')
    @endif
@endpush

@push('fonts')
    <link rel="dns-prefetch" href="{{ url('https://fonts.gstatic.com') }}">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,600') }}" rel="stylesheet" type="text/css">
@endpush

@push('styles')
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
@endpush