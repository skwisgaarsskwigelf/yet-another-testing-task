/**
 * Created by ratherrum on 28.11.17.
 */
$(document).ready(function () {
    function refresh() {
        $.ajax({
            type: 'GET',
            url: 'getPosts.php',
            dataType: 'json',
            success: function (data) {
                $("tbody").empty();
                for (i = 0; i < 5; i++) {
                    $("tbody").append('<tr><td>' + data[i].name + '</td><td>' + data[i].body + '</td><td>' + data[i].dtime + '</td></tr>');
                }
            }
        });
    }

    refresh();
    $('button[type=submit]').click(function (event) {
        var dataToPost = {
            retrievedData: {
                name: document.querySelector("input[id=inputName]").value,
                text: document.querySelector("textarea[id=redex]").value
            },
            postData: function () {
                $.ajax({
                    type: 'POST',
                    url: 'controller.php',
                    data: this.retrievedData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success_msg) {
                            refresh();
                            setTimeout(function () {
                                alert(data.success_msg);
                            }, 100);
                        } else if (data.error_msg) {
                            alert(data.error_msg);
                        }
                    }
                });
            }
        };
        dataToPost.postData();
        event.preventDefault();
    });
});