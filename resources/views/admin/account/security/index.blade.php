@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Security'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Account</h6>
            <h2 class="dashhead-title">Security</h2>
        </div>
    </div>

    <div class="list-group mt-3 shadow-lg" style="margin-bottom: 20px; border-bottom-right-radius: .25em; border-bottom-left-radius: .25em">
        @foreach($data['actions'] as $action)
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
               data-toggle="modal" data-target="#modal-{{ $action->id }}" aria-controls="collapse-{{ $action->id }}"
               aria-expanded="false">
                {{ sprintf('%s.%s', $action->log_name, $action->description) }}
                <span class="text-muted">{{ \Carbon\Carbon::parse($action->created_at)->diffForHumans() }}</span>
            </a>
            @include('admin.components.modals.account.security.actions')
        @endforeach
    </div>

    {{ $data['actions']->links() }}
@endsection