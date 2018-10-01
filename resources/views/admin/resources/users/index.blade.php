@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Users'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Resources</h6>
            <h2 class="dashhead-title">Users</h2>
        </div>
        <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-mail Address</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['users'] as $user)
                <tr>
                    <td>
                        <img src="{{ \App\Helpers\Images\Avatar::generateGravatarUrl($user->email) }}" class="rounded-circle mr-2" style="width: 25px">
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        <span class="small text-muted">Last seen {{ \Carbon\Carbon::parse($user->activity->last()->created_at)->diffForHumans() }}</span>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->first() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $data['users']->links() }}
@endsection