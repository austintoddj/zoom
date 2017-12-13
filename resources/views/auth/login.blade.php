@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="col-lg-8 offset-lg-2">
                    <div class="form-group">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               placeholder="Password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </div>

                    <div class="form-group">
                        @if(env('SOCIALITE'))
                            @include('auth.components.socialite.links')
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
