/**
 * Created by ratherrum on 28.11.17.
 */

$(document).ready(function () {
    $('button[type=submit]').click(function (event) {
        var toPost = {
            'name': $('input[id=inputName]').val(),
            'text': $('textarea[id=redex]').val()
        };
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: toPost,
            dataType: 'json',
            success: function (data) {
                if (data.success_msg) {
                    $('.res').fadeIn(4000).append(data.success_msg);
                }
                else if (data.error_msg) {
                    $('.res').fadeIn(4000).append(data.error_msg);
                }
            }
        });
        event.preventDefault();
    });
});