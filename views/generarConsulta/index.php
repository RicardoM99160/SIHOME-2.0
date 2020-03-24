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
    <body onload="numeroCampos(4)">
        <!-- Validaciones -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/validaciones.js"></script>
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/listaOrden.js"></script>

        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina"> 
                    <h4>Nueva consulta <?php echo ' | PACIENTE '.$_SESSION['idPaciente']; ?></h4>
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
                                                <textarea class="form-control" rows="3" id="comment" tabindex ="1" required></textarea> 
                                            </div> 
                                            <!--Enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Enfermedad actual*</label>
                                                <textarea class="form-control" rows="2" id="comment" tabindex ="1" required></textarea> 
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
                                                    <input type="text" name="filtro" id="inputTemperatura" class="form-control" placeholder="" required onchange="validar('inputTemperatura', 'decimales', 0)">    
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">&#176;C</span>
                                                    </div>
                                                    <div class="invalid-feedback">Ingrese una temperatura válida.</div>
                                                </div>  
                                        </div> 
                                        <!--pulso-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Pulso</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputPulso" class="form-control" placeholder="" required onchange="validar('inputPulso', 'enteros', 1)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">lat/min</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese un pulso válida.</div>
                                            </div> 
                                        </div>
                                    
                                    </div>

                                    <div class="col-md-5">
                                        <!--presion-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Presión</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputPresion" class="form-control" placeholder="" required onchange="validar('inputPresion', 'presion', 2)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mmHg</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese una presión válida.</div>
                                            </div> 
                                        </div>
                                        <!--Frecuencia respiratoria-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Frecuencia respiratoria</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="filtro" id="inputFrecuencia" class="form-control" placeholder="" required onchange="validar('inputFrecuencia', 'enteros', 3)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">resp/min</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese una frecuencia válida.</div>
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
                                            <?php
                                            include 'libs/datosPacientes.php';
                                            $datosP = new paciente;
                                            $datosP->mostrarNombreC($_SESSION['idPaciente']);
                                            ?> 
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
                                                <option>Sin examenes</option>
                                                <option>Análisis de orina</option>
                                                <option>Hemograma completo</option>
                                                <option>Coprocultivo</option>
                                            </select>
                                        <button type="button" id="btn-agregar" value="Guardar" onclick="newElement(); removerOpcionSelect('listaOrdenes','btn-agregar');"> 
                                        
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
        <!--Gigjo DatePicker
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <script src="public/js/DatePicker.js"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
    </body>
</html>