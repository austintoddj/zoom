<form role="form" method="POST" action="{{ url('/password/email') }}">
    {!! csrf_field() !!}
    <div class="form-group">
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>
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