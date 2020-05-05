
botones = document.querySelectorAll(".cPass");
botonCambioContra = document.getElementById("guardarP");
inputContra = document.getElementById("nuevoPassword");
checkboxesHabilitarU = document.querySelectorAll(".habilitarUsuario");

codigo = "";
password = "";
habilitado = "";


//El metodo onclick del boton de cambiar contraseña obtiene el código del usuario seleccionado
botones.forEach(boton  => {
    boton.addEventListener("click", function(){
        codigo = this.dataset.codigo;
        console.log(codigo);
    });
});

//Funcion para hacer un http request que cambia la contraseña del usuario
botonCambioContra.addEventListener("click", function(){
    password = inputContra.value;
    console.log("http://localhost/SIHOME-2.0/admin/cambiarContra/" + codigo + "/" + password);
    httpRequest("http://localhost/SIHOME-2.0/admin/cambiarContra/" + codigo + "/" + password, function(){
    //Majano
    //console.log("http://localhost/Proyecto%20LIS/SIHOME-2.0/admin/cambiarContra/" + codigo + "/" + password);
    //httpRequest("http://localhost/Proyecto%20LIS/SIHOME-2.0/admin/cambiarContra/" + codigo + "/" + password, function(){
        console.log(this.responseText);
    });
    console.log("Contraseña cambiada");
});

checkboxesHabilitarU.forEach(checkboxU =>{
    checkboxU.addEventListener("click",function(){
        codigo = this.dataset.codigo;
        if(checkboxU.checked == true){
            //Si está habilitado se le asigna el valor de 1
            habilitado = "1";
        }else{
            //Si está deshabilitado se le asigna el valor de 2
            habilitado = "0";
        }
        console.log(codigo);
        console.log(habilitado);
        console.log("http://localhost/SIHOME-2.0/admin/habilitarUsuario/" + codigo + "/" + habilitado);
        httpRequest("http://localhost/SIHOME-2.0/admin/habilitarUsuario/" + codigo + "/" + habilitado, function(){
        //console.log("http://localhost/Proyecto%20LIS/SIHOME-2.0/admin/habilitarUsuario/" + codigo + "/" + habilitado);
        //httpRequest("http://localhost/Proyecto%20LIS/SIHOME-2.0/admin/habilitarUsuario/" + codigo + "/" + habilitado, function(){
            console.log(this.responseText);
        });
    });
});




//Funcion que realiza el http request
function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("POST", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}