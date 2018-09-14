<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group row">
        <div class="col-md-12">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
            </button>
        </div>
    </div>

    @if(config('socialite.enabled'))
        <hr class="w-25 my-4">
        <div class="form-group row mt-3">
            @include('auth.components.socialite.links')
        </div>
    @endif
</form>