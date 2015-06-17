$(document).ready(function () {
    $('form.blogger').submit(function (event) {
        event.preventDefault();
        var that = $(this);

        $.ajax({
            type: 'POST',
            url: that.attr('action'),
            data: that.serialize(),
            success: function (response) {
                $('.previous-comments').html($(response).find('.previous-comments').html());
            }
        });
    });
});