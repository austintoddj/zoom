<form role="form" method="POST" action="{{ route('password.reset') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <div class="col-lg-6">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" placeholder="E-Mail Address" value="{{ $email or old('email') }}">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <input type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <input type="password"
                       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                       name="password_confirmation" placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">
                    Reset Password
                </button>
            </div>
        </div>
    </div>
</form>