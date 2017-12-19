@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <div class="col-lg-10 offset-lg-1">
                @include('auth.forms.login')
            </div>
        </div>
    </div>
    <p class="text-center small mt-4">
        <a href="{{ route('password.request') }}" class="btn btn-link">Forgot your password?</a>
        @if (config('auth.registration'))
            <a href="{{ route('register') }}" class="btn btn-link">Need an account? Register</a>
        @endif
    </p>
    @if(env('SOCIALITE'))
        <div class="text-center mt-3">
            @include('auth.components.socialite.links')
        </div>
    @endif
@endsection