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
                <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-fw fa-user-plus"></i></a>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        @include('admin.components.tables.resources.users.index')
    </div>
@endsection