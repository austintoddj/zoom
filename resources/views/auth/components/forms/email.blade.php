<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="login__block__body">
        @if (session('status'))
            <p class="mt-4 text-success">{{ session('status') }}</p>
        @else
            <p class="mt-4">Enter your email and we'll send you a link to reset your password.</p>
        @endif

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

            <button type="submit" class="btn btn--icon login__block__btn"><i class="fas fa-arrow-right"></i></button>
    </div>
</form>