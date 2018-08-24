@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">User Details</div>

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