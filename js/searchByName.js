$(document).ready (function () {
    $("#name").keyup(function () {
        $('#massegeShow').hide();
        var name = $("#name").val ();

        if (name != "") {
            $.ajax ({
                url: 'ajax/searchName.php',
                type: 'POST',
                cache: false,
                data: {'name': name},
                dataType: 'json',
                success: function (data){
                    $('#massegeShow').html("");
                    for (var i=0; i<=data.length-1; i++) {
                        var project = data[i];
                        $('#massegeShow').append('<a href="show.php?id='
                            +project.id+'">'+project.title+'</a></br>');
                        $('#massegeShow').show ();
                    }
                }
            });
        }
    });
});