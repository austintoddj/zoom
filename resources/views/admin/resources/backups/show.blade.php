@extends('admin.layout')

@section('title', sprintf('%s - %s', config('app.name', 'Laravel'), 'Backup Details'))

@section('content')
    <div class="dashhead">
        <div class="dashhead-titles">
            <h6 class="dashhead-subtitle">Resources</h6>
            <h2 class="dashhead-title">Backup Details</h2>
        </div>
    </div>

    <div class="card mt-3 shadow-sm border-0">
        <table class="table table-borderless mb-0">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="border-top-left-radius: .1875rem">Path</th>
                <th scope="col">Created At</th>
                <th scope="col">Size</th>
                <th scope="col" style="border-top-right-radius: .1875rem"></th>
            </tr>
            </thead>
            <tbody>
            @if(count($backups) > 0)
                @foreach($backups as $backup)
                    <tr>
                        <td>{{ $backup['path'] }}</td>
                        <td>{{ $backup['date'] }}</td>
                        <td>{{ $backup['size'] }}</td>
                        <td>
                            <a href="{{ route('backups.download') }}" class="btn btn-link py-0"><i class="fas fa-fw fa-download"></i></a>
                            <a href="#" class="btn btn-link py-0"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No backups present</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection