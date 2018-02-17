<form role="form" method="POST" action="{{ route('profile') }}">
    @csrf
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-right">Name</label>
        <div class="col-lg-6">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-right">E-Mail Address</label>
        <div class="col-lg-6">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-right">New Password</label>
        <div class="col-lg-6">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
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
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">
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
                Update Profile
            </button>
        </div>
    </div>
</form>