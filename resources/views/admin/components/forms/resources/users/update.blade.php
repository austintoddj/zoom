<form role="form" method="POST" action="{{ route('users.update', $data['user']->id) }}">
    @method('put')
    @csrf
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">ID</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="id" title="ID" value="{{ $data['user']->id }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">Role</label>
        <div class="col-lg-8">
            <select class="custom-select" name="role" @if(auth()->user()->id == $data['user']->id) disabled @endif>
                @foreach($data['roles'] as $role)
                    <option value="{{ $role->name }}" @if($role->name == $data['user']->getRoleNames()->first()) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">Name</label>
        <div class="col-lg-8">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" title="Name" value="{{ $data['user']->name }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">E-Mail Address</label>
        <div class="col-lg-8">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" title="Email" value="{{ $data['user']->email }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">New Password</label>
        <div class="col-lg-8">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" title="Password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-left">Confirm Password</label>
        <div class="col-lg-8">
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" title="Password Confirmation">
            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-8 offset-lg-4">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
            <a href="#" class="btn btn-link @if(auth()->user()->id == $data['user']->id) disabled @endif" data-toggle="modal" data-target="#modal-delete-{{ $data['user']->id }}">Delete</a>
        </div>
    </div>
</form>