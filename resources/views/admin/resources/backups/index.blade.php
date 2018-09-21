@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Backup'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Resources</h6>
            <h2 class="dashhead-title">Backups</h2>
        </div>
        <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item">
                <a href="{{ route('backups.store') }}" class="btn btn-primary">Create Backup</a>
            </div>
        </div>
    </div>

    <div class="card mt-3 shadow-sm border-0">
        <table class="table table-borderless mb-0">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="border-top-left-radius: .1875rem">Disk</th>
                <th scope="col">Healthy</th>
                <th scope="col">Amount of Backups</th>
                <th scope="col">Latest Backup</th>
                <th scope="col" style="border-top-right-radius: .1875rem">Used Storage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($backups as $backup)
                <tr>
                    <td><a href="{{ route('backups.show', $backup['disk']) }}">{{ $backup['disk'] }}</a></td>
                    <td>@if($backup['healthy']) <i class="far fa-fw fa-check-circle text-success"></i> @else <i class="far fa-fw fa-times-circle text-danger"></i> @endif</td>
                    <td>{{ $backup['amount'] }}</td>
                    <td>{{ $backup['newest'] }}</td>
                    <td>{{ $backup['usedStorage'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection