$(function() {
    let $btn = $('.btn-load');

    $btn.on('click', function () {
        $btn.addClass('disabled');
        $btn.html("<i class='fas fa-fw fa-circle-notch fa-spin'></i> " + $btn.text());
    });
});
