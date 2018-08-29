@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default shadow-sm rounded">
                        <div class="card-header">Users</div>
                        <div class="card-body">
                            @include('admin.components.tables.users.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection