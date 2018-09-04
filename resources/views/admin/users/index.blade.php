@extends('layouts.admin')

@section('title', 'Users')

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
    <hr class="mt-3">

    @include('admin.components.notifications.success')
    @include('admin.components.notifications.error')

    <div class="table-responsive">
        @include('admin.components.tables.users.index')
    </div>
@endsection