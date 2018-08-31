<form role="form" method="POST" action="{{ route('users.update', $data['user']->id) }}">
    @method('put')
    @csrf
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">ID</label>
        <div class="col-lg-6">
            <input type="text" class="form-control-plaintext" name="id" title="ID" value="{{ $data['user']->id }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Avatar</label>
        <div class="col-lg-6">
            <img src="{{ \App\Helpers\Images\Avatar::generateGravatarUrl($data['user']->email) }}" alt="{{ $data['user']->name }}" class="rounded w-50">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Role</label>
        <div class="col-lg-6">
            <select class="custom-select" name="role" @if(auth()->user()->id == $data['user']->id) disabled @endif>
                @foreach($data['roles'] as $role)
                    <option value="{{ $role->name }}" @if($role->name == $data['user']->getRoleNames()->first()) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Name</label>
        <div class="col-lg-6">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" title="Name" value="{{ $data['user']->name }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">E-Mail Address</label>
        <div class="col-lg-6">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" title="Email" value="{{ $data['user']->email }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">New Password</label>
        <div class="col-lg-6">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" title="Password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Confirm Password</label>
        <div class="col-lg-6">
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" title="Password Confirmation">
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
                Update
            </button>
        </div>
    </div>
</form>