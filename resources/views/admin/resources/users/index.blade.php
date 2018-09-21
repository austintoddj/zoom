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

    <div class="card mt-3 shadow-sm border-0" style="margin-bottom: 20px">
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="border-top-left-radius: .1875rem">Name</th>
                    <th scope="col">E-mail Address</th>
                    <th scope="col" style="border-top-right-radius: .1875rem">Role</th>
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
    </div>

    {{ $data['users']->links() }}
@endsection