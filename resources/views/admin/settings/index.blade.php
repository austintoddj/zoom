@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Settings</div>
                        <div class="card-body">
                            @include('admin.components.notifications.success')
                            @include('admin.components.notifications.error')
                            @include('admin.components.forms.users.update')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection