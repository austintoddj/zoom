@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input
                            id="email"
                            type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="E-Mail Address"
                            required
                            autofocus
                    >

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input
                            id="password"
                            type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password"
                            placeholder="Password"
                            required
                    >

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-check-label mt-2">
                        <input type="checkbox" class="form-check-input checkbox-inline"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                    <button type="submit" class="btn btn-primary pull-right">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center small mt-4">
        <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your Password?</a>&nbsp;&nbsp;
        <a href="{{ route('register') }}" class="btn btn-link">Need an account? Register</a>
    </p>

    <div class="text-center mt-3">
        @if(env('SOCIALITE'))
            @include('auth.components.socialite.links')
        @endif
    </div>
@endsection