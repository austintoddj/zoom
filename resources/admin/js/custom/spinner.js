$(function() {
    let button = $('.btn-spin');

    button.on('click', function () {
        button.addClass('disabled');
        button.html("<i class='fas fa-fw fa-circle-notch fa-spin'></i> " + button.text());
    });
});
