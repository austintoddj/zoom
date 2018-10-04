<div class="modal fade" id="modal-delete-{{ $data['user']->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">Delete User?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user? This cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger"
                   onclick="event.preventDefault();document.getElementById('user-delete-{{ $data['user']->id }}').submit();"
                   aria-label="Delete User">Delete</a>

                <form id="user-delete-{{ $data['user']->id }}" action="{{ route('users.destroy', $data['user']->id) }}" method="POST" style="display: none">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>