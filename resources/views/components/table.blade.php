<div class="table-responsive">
    <table class="table" id="{{ $table_id or 'table-id' }}">
        <thead>
            {{ $thead ?? '' }}
        </thead>

        <tbody>
            {{ $tbody ?? '' }}
        </tbody>

        <tfoot>
            {{ $tfoot ?? '' }}
        </tfoot>
    </table>
</div>