@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Security'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Account</h6>
            <h2 class="dashhead-title">Security</h2>
        </div>
    </div>

    <ul class="list-group mt-3" style="margin-bottom: 20px">
        @foreach($data['actions'] as $action)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ sprintf('%s.%s', $action->log_name, $action->description) }}
                <span class="text-muted">{{ \Carbon\Carbon::parse($action->created_at)->diffForHumans() }}</span>
            </li>
        @endforeach
    </ul>

    {{ $data['actions']->links() }}
@endsection