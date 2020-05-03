// Eliminar un orden
var close = document.getElementsByClassName("eliminarOrden");
var i; 
let texto = new Set();
 
// Agregar un orden
function newElement() { 
  var select = document.getElementById("listaOrdenes");
  var li = document.createElement("li");
  var inputValue = select.value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  texto.add(inputValue);
  CadenaFinal = añadirOpcionSelect(texto);
  document.getElementById('listaOrdenes').value = '';
  document.getElementById('listaOrdenes').focus();
  document.getElementById('listaO').value = CadenaFinal;

   
  document.getElementById("ordenesAgregados").appendChild(li); 

  var span = document.createElement("span");
  var i = document.createElement("i")
  i.classList.add("fas");
  i.classList.add("fa-minus-circle");
  span.id = inputValue;
  span.className = "eliminarOrden";
  span.appendChild(i);
  li.appendChild(span);
  li.classList.add("list-group-item");
  li.classList.add("d-flex");
  li.classList.add("justify-content-between");
  li.classList.add("align-items-center");

  for (i = 0; i < close.length; i++) 
  {
    close[i].onclick = function() 
    { 
      //Añadir la opción al select nuevamente
      var option = document.createElement("option");
      option.text = this.id;
      texto.delete(option.text);
      console.log(texto);
      CadenaFinal = añadirOpcionSelect(texto);
      document.getElementById('listaO').value = CadenaFinal;
      //Eliminar campo
      var div = this.parentElement;
      div.parentNode.removeChild(div);
    }
  }
}