$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: 'getPosts.php',
        dataType: 'json',
        success: function (data) {
            for (i = 0; i < 6; i++) {
                $(".w3-ul").append('<li><span class="w3-margin-right">' + data[i].name + '</span><span class="w3-margin-left">' + data[i].body + '</span></li>');
            }
        }
    });
});