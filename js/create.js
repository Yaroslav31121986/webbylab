$(document).ready (function () {
    $("#done").click (function () {
        // $('#massegeShow').hide();
        var name = $("#name").val ();
        var release_year = $("#release_year").val ();
        var stars = $("#stars").val ();
        var format = $("#format").val ();
        var myRe = new RegExp("[0-9]{4}", "gm")
        var fail = "";

        if (name.length < 1 ) {
            fail = "Вы не ввели название фильма";
        }
        else if (release_year.length < 1 ) {
            fail = "Вы не ввели год выпуска";
        }
        else if (!myRe.exec(release_year)) {
            fail = "Дата должна быть четырехзначным числом";
        }
        else if (stars.length < 1) {
            fail = "Вы не ввели список актеров";
        }
        if (fail != "") {
            $('#massegeShow').html (fail + "<div class='clear><br></div>'");
            $('#massegeShow').show ();

        } else {
            $.ajax ({
                url: 'createFilm.php',
                type: 'POST',
                cache: false,
                data: {'name': name, 'release_year': release_year, 'stars': stars, 'format': format},
                dataType: 'html',
                success: function (data){
                    var url = "http://webbylab/";
                    $(location).attr('href',url);
                }
            });
        }
    });
});