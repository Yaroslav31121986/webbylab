$(document).ready (function () {
    $("#stars").keyup(function () {
        $('#massegeShow').hide();
        var stars = $("#stars").val ();

        if (stars != "") {
            $.ajax ({
                url: 'ajax/searchActors.php',
                type: 'POST',
                cache: false,
                data: {'stars': stars},
                dataType: 'json',
                success: function (data){
                    if (data.length < 1) {
                        $('#massegeShow').html("Такого фильма нету");
                        $('#massegeShow').show ();
                    } else {
                        $('#massegeShow').html("");
                        for (var i=0; i<=data.length-1; i++) {
                            var project = data[i];
                            $('#massegeShow').append('<a href="show.php?id='
                                +project.id+'">'+project.title+'</a></br>');
                            $('#massegeShow').show ();
                        }
                    }
                }
            });
        }
    });
});