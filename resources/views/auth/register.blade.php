@extends('layouts.app')

@section('title', 'Signup')

@section('content')
<div class="login__block active" id="l-register">
    <div class="login__block__header palette-Blue bg">
        <i class="fas fa-user-circle"></i>
        Create an account

        <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
                <i data-toggle="dropdown" class="fas fa-ellipsis-v actions__item"></i>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('login') }}">Sign in</a>
                    <a class="dropdown-item" href="{{ route('password.request') }}">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>

    @include('auth.components.forms.register')
</div>
@endsection
