@extends('layouts.app')

@section('title', 'Forgot password')

@section('content')
    <div class="login__block active" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
            <i class="fas fa-user-circle"></i>
            Reset your password

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="fas fa-ellipsis-v actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('login') }}">Sign in</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Create an account</a>
                    </div>
                </div>
            </div>
        </div>

        @include('auth.components.forms.email')
    </div>
@endsection
