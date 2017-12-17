@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="col-lg-10 offset-lg-1">
                @include('auth.components.notifications.success')
                @include('auth.forms.email')
            </div>
        </div>
    </div>
    <p class="text-center small mt-4">
        <a href="{{ route('login') }}" class="btn btn-link">Remember your password? Login</a>
    </p>
@endsection