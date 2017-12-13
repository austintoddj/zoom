@extends('layouts.admin')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <div class="col-lg-8 offset-lg-2">
                    <div class="form-group">
                        @if(!empty($name))
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ $name }}" placeholder="Name" required autofocus>
                        @else
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" placeholder="Name" required autofocus>
                        @endif
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        @if(!empty($email))
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ $email }}" placeholder="E-Mail Address" required>
                        @else
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   placeholder="E-Mail Address" value="{{ old('email') }}" required>
                        @endif
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password"
                               class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                               name="password_confirmation" placeholder="Confirm Password" required>
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
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