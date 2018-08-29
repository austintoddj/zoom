<ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    @role('Super Admin')
    <li class="list-group-item">
        <a href="{{ route('users') }}" class="card-link"><i class="fas fa-users fa-fw"></i> Users</a>
    </li>
    @endrole
</ul>