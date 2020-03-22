
var campos = [0, 0, 0, 0, 0, 0, 0];

function validar(id, tipo, indice)
{
	var re="";
	switch(tipo) 
	{
		case "nombre":
		var re=/^[a-zA-Z]{1,20}/;
		break;

		case "telefono":
		var re=/^\(?([0-9]{4})\)?[- ]?([0-9]{4})$/;
		break;
		
		case "DUI":
		var re=/^[0-9]{8}-[0-9]{1}/;
		break;
		
		default:
		var re=""
    }
	var datos = document.getElementById(id);
	if(re.test(datos.value) || (datos.value == "") && (indice > 3))
    {
    	//Válido
        datos.classList.remove('is-invalid');
        campos[indice] = 1;
        habilitarGenerar()
    }
    else
    {
    	//Inválido
        datos.classList.add('is-invalid');
        campos[indice] = 0;
        habilitarGenerar()
    }
}

function validarFecha()
{
	var fecha = new Date();
	var dd = fecha.getDate();
	var mm = fecha.getMonth()+1;
	var yyyy = fecha.getFullYear();
	if(dd<10)
	{
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    }
    fecha = yyyy+'-'+mm+'-'+dd;
    document.getElementById("fechaNacimiento").setAttribute("max", fecha.toString());
}

function habilitarGenerar(fecha, indice)
{
	var check = 0;
	for (var i = 0; i < 4; i++)
	{
		check = check + campos[i];
	}
	if (check == 4)
	{
		document.getElementById("btn-generar").disabled = false;
	}
	else
	{
		document.getElementById("btn-generar").disabled = true;
	}
}