
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

function fechaActual()
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
    return fecha;
}

function validarFecha(id)
{
	//console.log(fechaActual().toString());
	document.getElementById(id).setAttribute("max", fechaActual().toString());
}

function formatoRango(rango)
{
	if(undefined != rango)
	{
		var rangoStr = "" + rango;
		re = /[0-9]{1,3},[0-9]{1,3}/g;

		if(re.test(rangoStr))
		{
			var edades = rangoStr.split(",");
			var rango_formateado = "";
			if(edades[0] == edades[1])
			{
				if (edades[0] == 1) rango_formateado = "1 año";
				else rango_formateado = edades[0].toString() + " años";
			}
			else rango_formateado = "de " + edades[0].toString() + " a " + edades[1].toString() + " años";
			return rango_formateado;
		}
		else return rango;
	}
	else return;
}

function resetearCampos()
{
	//Aún no
}