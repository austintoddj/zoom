@if (session('success'))
    <div class="alert alert-success alert-dismissible fixed-top border-0" style="border-radius: 0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong>
        {{ session('success') }}
    </div>

    <script type="text/javascript">
        $(document).ready (function(){
            $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
                $('.alert-success').slideUp(100);
            });
        });
    </script>
@endif