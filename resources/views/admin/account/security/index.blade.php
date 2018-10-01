@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Security'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Account</h6>
            <h2 class="dashhead-title">Security</h2>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Action</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['actions'] as $action)
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modal-{{ $action->id }}">
                            {{ sprintf('%s.%s', $action->log_name, $action->description) }}
                        </a>
                        @include('admin.components.modals.account.security.actions')
                    </td>
                    <td>{{ \Carbon\Carbon::parse($action->created_at)->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $data['actions']->links() }}
@endsection