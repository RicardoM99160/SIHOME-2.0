function DoAjaxPostAndMore(btnClicked)
{
       var $form = $(btnClicked).parents('form');

        $.ajax({
            type: "POST",
            url: '/editarHistoria/prueba',
            data: $form.serialize(),
            error: function(xhr, status, error) {
                log("el sida no tiene cura");
             },
            success: function(response) {
                 //do something with response 
                 log("ll");

            }
        });

  return false;// if it's a link to prevent post

}