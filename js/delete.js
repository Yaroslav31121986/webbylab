$(document).ready (function () {
    $('#massegeShow').hide();
    $(".btn-primary").click (function (event) {
        var id = event.target.dataset.id;
        var block = "#block"+id;
            $.ajax ({
                url: 'delete.php',
                type: 'POST',
                cache: false,
                data: {'id': id},
                dataType: 'json',
                success: function (data){
                    $('#massegeShow').html (data);
                    $('#massegeShow').show ();
                    $(block).remove()
                }
            });
    });
});