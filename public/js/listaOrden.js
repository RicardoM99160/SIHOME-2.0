 
 
// Eliminar un orden
var close = document.getElementsByClassName("eliminarOrden");
var i; 
 
// Agregar un orden
function newElement() { 
  var li = document.createElement("li");
  var inputValue = document.getElementById("listaOrdenes").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
   
  document.getElementById("ordenesAgregados").appendChild(li); 

  var span = document.createElement("span");
  var i = document.createElement("i")
  i.classList.add("fas");
  i.classList.add("fa-minus-circle"); 
  span.className = "eliminarOrden";
  span.appendChild(i);
  li.appendChild(span);
  li.classList.add("list-group-item");
  li.classList.add("d-flex");
  li.classList.add("justify-content-between");
  li.classList.add("align-items-center");
   

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {  
      var div = this.parentElement;
      div.parentNode.removeChild(div);
    }
  }
}