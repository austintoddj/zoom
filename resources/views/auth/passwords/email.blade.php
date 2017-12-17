@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">
                            Send Password Reset Link
                        </button>
                </div>
            </form>
        </div>
    </div>

    <p class="text-center small mt-4">
        <a href="{{ route('login') }}" class="btn btn-link">Remember your password? Login</a>
    </p>
@endsection