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

    <div class="list-group mt-3 shadow-sm" style="margin-bottom: 20px; border-bottom-right-radius: .25em; border-bottom-left-radius: .25em">
        @foreach($data['users'] as $user)
            <a href="{{ route('users.show', $user->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                {{ $user->name }}
                <span class="text-muted">Last seen {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</span>
            </a>
        @endforeach
    </div>

    {{ $data['users']->links() }}
@endsection