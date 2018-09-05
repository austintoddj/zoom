<table class="table">
    <thead>
    <tr>
        <th scope="col" class="header">Avatar</th>
        <th scope="col" class="header">Name</th>
        <th scope="col" class="header">Email</th>
        <th scope="col" class="header"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['users'] as $user)
        <tr>
            <th scope="row"><img src="{{ \App\Helpers\Images\Avatar::generateGravatarUrl($user->email) }}" class="rounded-circle" width="30"></th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}">View Details</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $data['users']->links() }}