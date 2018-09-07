<div class="modal fade" id="modal-{{ $action->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">Action Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">Action</th>
                        <td>{{ sprintf('%s.%s', $action->log_name, $action->description) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Subject ID</th>
                        <td>{{ $action->subject_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Subject Type</th>
                        <td>{{ $action->subject_type }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Properties</th>
                        <td>{{ $action->properties }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>