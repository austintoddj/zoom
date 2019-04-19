<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="login__block__body">
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

        <button type="submit" class="btn btn--icon login__block__btn"><i class="fas fa-arrow-right"></i></button>
    </div>
</form>