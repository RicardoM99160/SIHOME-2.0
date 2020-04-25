 
 /*
document.addEventListener('DOMContentLoaded',populate_selects);


//Funcion para llenar los selects dinamicamente
function populate_selects(){ 
    var habitosToxicos =
    [
        {
            "text"  : "Tabaco",
            "value" : "Value 1",
            "selected":true
        },
        {
            "text"     : "Drogas",
            "value"    : "Value 2" 
        },
        {
            "text"  : "Infusiones",
            "value" : "Value 3"
        }
    ];

    var selectHabitos = document.getElementById('slt-listaToxicos');
    
    for(var i = 0, l = options.length; i < l; i++){
        var option = habitosToxicos[i];
        selectHabitos.options.add( new Option(option.text, option.value, option.selected) );
        }
} 

*/

const sec_habitosToxicos = document.getElementById("btn-modificarHabitos"); 
sec_habitosToxicos.addEventListener("click", toggle_container, false);
sec_habitosToxicos.father  = 'cont-agregarToxico'; 
sec_habitosToxicos.brother = 'btn-guardarHabitos';
sec_habitosToxicos.container = 'habitosToxicos';

btn_agregarToxico = document.getElementById("btn-agregarToxico");
btn_agregarToxico.addEventListener("click", add_categoria, false);
btn_agregarToxico.select = 'slt-listaToxicos'; 
btn_agregarToxico.input = 'input-observacionToxico'
btn_agregarToxico.container = 'habitosToxicos';
   
btn_agregarToxico.father = 'cont-agregarToxico';



function add_categoria(evt){ 
    var inputCategoria =document.createElement("input");
    inputCategoria.classList.add('form-control', 'text-uppercase', 'text-center');
    inputCategoria.value = document.getElementById(evt.currentTarget.select).value;
    inputCategoria.type = 'text';
    inputCategoria.disabled = true;

    var divCategoria = document.createElement("div");
    divCategoria.classList.add('col-2');  
    divCategoria.appendChild(inputCategoria);

    var inputObservacion = document.createElement("input");
    inputObservacion.classList.add("form-control");
    inputObservacion.value = document.getElementById(evt.currentTarget.input).value;
    inputObservacion.type = 'text';
    inputObservacion.disabled = true;


    var divObservacion = document.createElement("div");
    divObservacion.classList.add('col-5');  
    divObservacion.appendChild(inputObservacion);

    var contenedorCategoria = document.createElement("div");
    contenedorCategoria.classList.add('nodo', 'row', 'no-gutters', 'my-2'); 
    contenedorCategoria.appendChild(divCategoria);
    contenedorCategoria.appendChild(divObservacion); 

    var contenedorSeccion = document.getElementById(evt.currentTarget.container);
    contenedorSeccion.appendChild(contenedorCategoria);

    removerOpcionSelect('slt-listaToxicos', 'btn-agregarToxico');

    var btnGuardar = document.getElementById(evt.currentTarget.counterpart);
    btnGuardar.addEventListener("click", guardar_categoria, false); 

    function guardar_categoria(evt){  
         var x = document.getElementById(evt.currentTarget.father);
         x.classList.add("d-none");      
     }
     
    

}
 


function toggle_container(evt) { 


    var x = document.getElementById(evt.currentTarget.father);
    x.classList.remove("d-none");
    var btn_editar = document.getElementById(evt.currentTarget.id);
    btn_editar.disabled = true;
    desactivarModificar();
    btn_guardar= document.getElementById(evt.currentTarget.brother);  
    btn_guardar.classList.remove("d-none");
    btn_guardar.addEventListener("click", guardar_categoria, false); 

    function guardar_categoria(){ 
        activarModificar();
        x.classList.add("d-none"); 
        btn_guardar.classList.add("d-none");
        btn_editar.disabled = false; 
    } 


}

//Desactivar todos los botones para editar la historia
function desactivarModificar() {
    document.querySelectorAll('[name="edit_historia"]').forEach(element => { 
        element.setAttribute("disabled", true);
    });
}

//Activar todos los botones para editar la historia
function activarModificar() {
    document.querySelectorAll('[name="edit_historia"]').forEach(element => {  
        element.disabled = false; 
    });
}