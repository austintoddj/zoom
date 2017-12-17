@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <div class="col-lg-10 offset-lg-1">
                @include('auth.forms.register')
            </div>
        </div>
    </div>

    <p class="text-center small mt-4">
        <a href="{{ route('login') }}" class="btn btn-link">Already have an account? Login</a>
    </p>

    @if(env('SOCIALITE'))
        <div class="text-center mt-3">
            @include('auth.components.socialite.links')
        </div>
    @endif
@endsection