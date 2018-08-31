@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Users</h6>
            <h2 class="dashhead-title">All Users</h2>
        </div>
    </div>
    <hr class="mt-3">

    @include('admin.components.tables.users.index')
@endsection