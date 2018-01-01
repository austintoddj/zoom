@extends('layouts.admin')

@section('title', 'Security')

@section('content')
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Link with href
        </a>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Button with data-target
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>



    <p class="text-muted small"><strong>Current Session</strong></p>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="media">
                <span class="small text-success">&#9679;</span> <i class="icon-md d-flex mr-3 ml-3">@icon('computer-desktop', 'fill-muted')</i>
                <div class="media-body">
                    <h6 class="mb-2">{{ $data['session']['ip'] }}</h6>
                    <p class="small mb-1">
                        <b>{{ $data['session']['browser'] }}</b> on {{ $data['session']['operatingSystem'] }}
                    </p>
                    <p class="small mb-1">
                        <b>Last accessed</b> on {{ $data['session']['lastAccessed'] }}
                    </p>
                </div>
                <span class="pull-right">
                    <button href="{{ route('logout') }}" type="button" class="btn btn-sm btn-outline-secondary"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </span>
            </div>
        </li>
    </ul>

    <br>

    <div class="list-group mb-3">
        <h6 class="list-group-header">
            Activity Log ({{ count($data['activity']) }})
        </h6>

        @foreach($data['activity'] as $item)
            <a class="list-group-item list-group-item-action justify-content-between d-flex" data-toggle="collapse" href="#collapse{{ $item->id }}"
               aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                <span>{{ $item->log_name.'.'.$item->description }}</span>
                <span class="text-muted">{{ Carbon::parse($item->created_at)->diffForHumans() }}</span>
            </a>
            <div class="collapse table-responsive" id="collapse{{ $item->id }}">
                <table class="table table-striped table-sm table-bordered mt-3">
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
                    @if($item->properties != '[]')
                        <tr>
                            <td>Properties</td>
                            <td>{{ $item->properties }}</td>
                        </tr>
                    @endif
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
        @endforeach
    </div>
@endsection