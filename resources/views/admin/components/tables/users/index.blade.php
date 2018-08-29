<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Avatar</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['users'] as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <th scope="row"><img src="{{ \App\Helpers\Images\Avatar::generateGravatarUrl($user->email) }}" class="rounded-circle" width="30"></th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}"><i class="far fa-fw fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}" class="btn @if($user->id == auth()->user()->id) disabled @endif">
                    <i class="far fa-fw fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @include('admin.components.modals.users.delete')
    @endforeach
    </tbody>
</table>