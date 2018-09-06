@if (session('error'))
    <div class="alert alert-danger alert-dismissible fixed-top border-0" style="border-radius: 0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error!</strong>
        {{ session('error') }}
    </div>

    <script type="text/javascript">
        $(document).ready (function(){
            $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
                $('.alert-danger').slideUp(500);
            });
        });
    </script>
@endif