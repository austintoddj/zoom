<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="login__block__body">
        <div class="form-group form-group--float form-group--centered">
            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required>

            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            <label>First Name</label>
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
            <label>Last Name</label>
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label>Email Address</label>
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label>Password</label>
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            <label>Confirm Password</label>
            <i class="form-group__bar"></i>
        </div>

        <button type="submit" class="btn btn--icon login__block__btn"><i class="fas fa-arrow-right"></i></button>
    </div>
</form>