@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login__block active" id="l-login">
    <div class="login__block__header">
        <i class="fas fa-user-circle"></i>
        Sign in to {{ config('app.name') }}

        <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
                <i data-toggle="dropdown" class="fas fa-ellipsis-v actions__item"></i>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('register') }}">Create an account</a>
                    <a class="dropdown-item" href="{{ route('password.request') }}">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center pt-3 font-weight-bold">
        <span class="font-italic text-danger"><i class="fas fa-exclamation-circle"></i> For testing purposes only</span><br>
        <code style="cursor: pointer;" class="text-muted">{{ App\User::all()->random()->email }}</code>
    </p>

    @include('auth.components.forms.login')
</div>
@endsection
