@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">Change Password</div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Success!</strong>
                    {{ session('success') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ route('password') }}">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label text-lg-right">New Password</label>

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
                                name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 offset-lg-4">
                        <p class="small">Your password must be a minimum of 6 characters.</p>
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                        <a href="{{ route('profile') }}" class="btn btn-link">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection