@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Users</h6>
            <h2 class="dashhead-title">All Users</h2>
        </div>
        <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item">
                <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-fw fa-user-plus"></i></a>
            </div>
        </div>
    </div>
    <hr class="mt-3">

    {{--@include('admin.components.tables.users.index')--}}
    @component('components.datatable', [
        'table_id' => 'user-datatable',
        'route_name' => 'datatables.user',
        'columns' => [
                ['data' => 'name', 'name' => 'name', 'header' => 'Name'],
                ['data' => 'email', 'name' => 'email', 'header' => 'E-mail'],
            ]
        ])
    @endcomponent
@endsection