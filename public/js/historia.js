function eliminarHabito(btnE)
{ 

     $id=btnE.value;

     $.ajax({
        type: "POST",
        url: 'http://127.0.0.1/SIHOME-2.0/editarHistoria/eliminarHT',  
        beforeSend: function () {
            
        },
        success: function (result) {
            console.log("result"); //use this to see the response from serverside
        },
        error: function (e) {
            console.log(e); //use this to see an error in ajax request
        }        
      
    });       
 

}


function eliminarHabito(btnE)
{ 

     $id=btnE.value;
        console.log($id);

        httpRequest("" + $id, function(){
            console.log("Habito eliminado");
            console.log(this.responseText);
        });
 
    }
