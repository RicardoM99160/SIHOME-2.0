<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Generar una consulta</title>

        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/generarConsulta.css">
    </head>
    <body>
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina"> 
                    <h4>Nueva consulta</h4>
                </div>
                <!--- Formulario generar consulta-->
                <form id="form-generarConsulta" action="">
                    <div class="row">
                        <div class="col-md-6"> 
                             <!--- Seccion datos de consulta-->
                         <div class="seccionFormulario card">
                                <h5 class="font-tituloSeccion card-header">Datos de consulta</h5>
                                <div class="frm-seccion card-body text-align-center">  
                                    <!--Fila -->
                                    <div class="row"> 
                                        <div class='col'>
                                            <!--Motivo de consulta-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Motivo de consulta*</label>
                                                <textarea class="form-control" rows="3" id="comment" tabindex ="1"></textarea> 
                                            </div> 
                                            <!--Enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Enfermedad actual*</label>
                                                <textarea class="form-control" rows="2" id="comment" tabindex ="1"></textarea> 
                                            </div> 
                                            <!--Antecedentes de enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Antecedentes de enfermedad actual</label>
                                                <textarea class="form-control" rows="3" id="comment" tabindex ="1"></textarea> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>
                            </div> 
                        <!--- Seccion examen fisico-->
                        <div class="seccionFormulario card">
                                <h5 class="font-tituloSeccion card-header">Examen físico</h5>
                                <div class="frm-seccion card-body">
                                <!--Fila 1 -->
                                <div class="row"> 
                                    <div class='col-md-5'>
                                        <!--temperatura-->
                                        <div class="form-group"> 
                                            <label for="" class="w-75">Temperatura</label> 
                                                <div class="input-group"> 
                                                    <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="">    
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">&#176;C</span>
                                                    </div>
                                                </div>  
                                        </div> 
                                        <!--pulso-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Pulso</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">lat/min</span>
                                                </div>
                                            </div> 
                                        </div>
                                    
                                    </div>

                                    <div class="col-md-5">
                                        <!--presion-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Presión</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mmHg</span>
                                                </div>
                                            </div> 
                                        </div>
                                        <!--Frecuencia respiratoria-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Frecuencia respiratoria</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">resp/min</span>
                                                </div>
                                            </div> 
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div></div>
                    <div class='col-md-6'>
                         <!--Datos de paciente-->
                         <div class="seccionFormulario card">
                                <h5 class="font-tituloSeccion card-header text-center">Datos de paciente</h5>
                                <div class="frm-seccion card-body">   
                                    <div class="col"> 
                                        <!--Fila 1--> 
                                        <div class="row"> 
                                            <div class="row form-group no-gutters">
                                                <!--Nombre completo -->
                                                <div class="col-9 px-1">
                                                    <label for="fechaNacimiento">Nombre del paciente</label>
                                                    <input type="text" name="" id="" value="Dieguito Armando, Maradona" class="form-control" disabled>
                                                </div>
                                                <!--DUI-->
                                                <div class="col-3 px-1">
                                                    <label for="dui">DUI</label>
                                                    <input type="text" name="dui" id="dui" value="00000000-0" class="form-control" disabled>
                                                </div> 
                                            </div>  
                                            <!-- Fila 2 --> 
                                            <div class="row form-group no-gutters">
                                                <!--Fecha de nacimiento -->
                                                <div class="col-5 px-1">
                                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="12 mayo 1990 (30 años)" class="form-control" disabled>
                                                </div>
                                                <!-- Sexo -->
                                                <div class="col-4 px-1">
                                                    <label for="sexo">Sexo</label>
                                                    <input type="text" name="sexo" id="sexo" value="Masculino" class="form-control" disabled>
                                                </div>
                                                <!--Tipo de sangre -->
                                                <div class="col-3 px-1">
                                                    <label for="tipoSangre">Tipo de sangre</label>
                                                    <input type="text" name="tipoSangre" id="tipoSangre" value="O+" class="form-control" disabled>
                                                </div> 
                                        
                                            </div>                             
                                            <!-- Fila 3 -->  
                                            <div class="row form-group no-gutters">
                                                <!--Direccion -->
                                                <div class="col-9 px-1">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" name="direccion" id="direccion" value="Col El Trafico 1, Calle Venecia, Casa 3A-1, San Vicente" class="form-control" disabled>
                                                </div>
                                                <!--Telefono-->
                                                <div class="col-3 px-1">
                                                    <label for="telefono">Teléfono</label>
                                                    <input type="text" name="telefono" id="telefono" value="0000-0000" class="form-control" disabled>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>  
                            </div>
                        <!--- Seccion Diagnostico-->
                        <div class=" seccionFormulario card">
                            <h5 class="font-tituloSeccion card-header">Diagnostico</h5>
                            <div class="frm-seccion card-body">
                            <!-- Fila-->
                           
                            <div class="row">
                                <div class="col">
                                    <!--Diagnostico-->
                                    <div class="form-group">
                                        <label for="" class='control-label'>Descripción de diagnostico*</label>
                                        <textarea class="form-control" rows="3" id="comment" tabindex ="1"></textarea> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="col">
                                    <!--Orden-->   
                                        <div class="form-group inline-form">
                                            <label for="" class="w-50">Orden</label>
                                            
                                            <select name="examenes" id="listaOrdenes" class="custom-select" required>
                                                <option selected>Sin examenes</option>
                                                <option>Análisis de orina</option>
                                                <option>Hemograma completo</option>
                                                <option>Coprocultivo</option>
                                            </select>
                                        <button type="button" id="btn-agregar" value="Guardar" onclick="newElement()"> 
                                        
                                        <i class="fas fa-plus-circle"></i><span>Agregar</span>
                                        </button>

                                        <ul id="ordenesAgregados" class="lista-orden list-group">
                                            <!--Ejemplo de li 
                                            <li id="orden-item" class="list-group-item d-flex justify-content-between align-items-center">Un item
                                                <span class="eliminarOrden"><i class="fas fa-minus-circle"></i></span>
                                            </li>  -->
                                        </ul>
                                        
                                   
                                    </div> 
                            </div>

                            
                        </div>
                        <!-- Boton GENERAR-->
                        <hr></hr>
                        <div class="row">
                            <div class="w-100 form-group d-flex justify-content-center">
                                <button type="submit" name="submit" id="btn-generar" value="Guardar" class="btn-action" disabled>
                                    <i class="fas fa-save"></i>
                                    Generar consulta
                                </button>
                            </div>
                        </div>
                        
                    </div>  
                        
                     
                    </div>
                </form> 
                   
                   
                
                
                 
                    </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Validaciones -->
        <script type="text/javascript" src="public/js/validaciones_generar.js"></script>
        <script type="text/javascript" src="public/js/listaOrden.js"></script>
        <!--Gigjo DatePicker
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <script src="public/js/DatePicker.js"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
    </body>
</html>