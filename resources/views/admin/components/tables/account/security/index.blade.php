<table class="table">
    <thead>
    <tr>
        <th scope="col" class="header">Action</th>
        <th scope="col" class="header">Subject</th>
        <th scope="col" class="header">Subject ID</th>
        <th scope="col" class="header">Time</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['actions'] as $action)
        <tr>
            <td>{{ sprintf('%s.%s', $action->log_name, $action->description) }}</td>
            <td>{{ $action->subject_type }}</td>
            <td>{{ $action->subject_id }}</td>
            <td>{{ \Carbon\Carbon::parse($action->created_at)->diffForHumans() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $data['actions']->links() }}