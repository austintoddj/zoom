@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">Activity Log</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($activity as $item)
                    <li class="list-group-item justify-content-between">
                        <a class="btn btn-link" data-toggle="collapse" href="#collapse{{ $item->id }}"
                           aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                            {{ $item->log_name.'.'.$item->description }}
                        </a>
                        <span class="pull-right"><small>{{ Carbon::parse($item->created_at)->diffForHumans() }}</small></span>
                        <div class="collapse table-responsive" id="collapse{{ $item->id }}">
                            <table class="table table-striped table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <td>Log Name</td>
                                    <td>{{ $item->log_name }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                                @if(isset($item->subject_id))
                                    <tr>
                                        <td>Subject ID</td>
                                        <td>{{ $item->subject_id }}</td>
                                    </tr>
                                @endif
                                @if(isset($item->subject_type))
                                    <tr>
                                        <td>Subject Type</td>
                                        <td>{{ $item->subject_type }}</td>
                                    </tr>
                                @endif
                                @if(isset($item->causer_id))
                                    <tr>
                                        <td>Causer ID</td>
                                        <td>{{ $item->causer_id }}</td>
                                    </tr>
                                @endif
                                @if(isset($item->causer_type))
                                    <tr>
                                        <td>Causer Type</td>
                                        <td>{{ $item->causer_type }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Properties</td>
                                    <td>{{ $item->properties }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        {{ $activity->links() }}
    </div>
@endsection