@extends('layouts.admin')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label text-lg-right">Name</label>
                    <div class="col-lg-6">
                        @if(!empty($name))
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>
                        @else
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @endif
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>
                    <div class="col-md-6">
                        @if(!empty($email))
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" required>
                        @else
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @endif
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label text-lg-right">Password</label>

                    <div class="col-lg-6">
                        <input
                                type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password"
                                required
                        >
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label text-lg-right">Confirm Password</label>

                    <div class="col-lg-6">
                        <input
                                type="password"
                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation"
                                required
                        >
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 offset-lg-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>

                @if(env('SOCIALITE'))
                    @include('auth.components.socialite.links')
                @endif
            </form>
        </div>
    </div>
@endsection