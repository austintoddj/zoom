$(function() {
    let button = $('.btn-load');

    button.on('click', function () {
        button.addClass('disabled');
        button.html("<i class='fas fa-fw fa-circle-notch fa-spin'></i> " + button.text());
    });
});
