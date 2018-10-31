$(function() {
    let button = $('.btn-spin');

    button.on('click', function () {
        let form = $(this).closest('form');

        if (form[0].checkValidity()) {
            button.addClass('disabled');
            button.html("<i class='fas fa-fw fa-circle-notch fa-spin'></i> " + button.text());
        }
    });
});