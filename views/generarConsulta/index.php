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

            <?php require 'views/barraLateral.php';?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina"> 
                    <h4>Nueva consulta | Paciente: <?php echo $_SESSION['datos'][0]['nombrePaciente']. ' '.$_SESSION['datos'][0]['apellidoPaciente']?></h4>
                </div>
                <?php
                    if(isset($_POST['submit']) && $_POST['submit'] == "Guardar"){
                ?>
                <div class="alert alert-success alert-dismissible fade show">
                    La nueva consulta ha sido agregada con exito.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
                    }
                ?>
                <!--- Formulario generar consulta-->
                <form id="form-generarConsulta" action="<?php echo constant('URL');?>generarConsulta/generarC" method="POST">
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
                                                <textarea name="motivo" class="form-control" rows="3" id="comment" tabindex ="1" required autofocus></textarea> 
                                            </div> 
                                            <!--Enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Enfermedad actual*</label>
                                                <textarea name="enfermedad" class="form-control" rows="2" id="comment" tabindex ="2" required></textarea> 
                                            </div> 
                                            <!--Antecedentes de enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Antecedentes de enfermedad actual</label>
                                                <textarea name="antecedente" class="form-control" rows="3" id="comment" tabindex ="3"></textarea> 
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
                                                    <input type="text" name="temperatura" id="inputTemperatura" class="form-control" placeholder="" tabindex ="4" required onchange="validar('inputTemperatura', 'decimales', 0)">    
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">&#176;C</span>
                                                    </div>
                                                    <div class="invalid-feedback">Ingrese una temperatura válida.<br>Ejemplo: 37.00</div>
                                                </div>  
                                        </div> 
                                        <!--pulso-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Pulso</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="pulso" id="inputPulso" class="form-control" placeholder="" required tabindex ="5" onchange="validar('inputPulso', 'enteros', 1)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">lat/min</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese un pulso válido.<br>Ejemplo: 130</div>
                                            </div> 
                                        </div>
                                    
                                    </div>

                                    <div class="col-md-5">
                                        <!--presion-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Presión</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="presion" id="inputPresion" class="form-control" placeholder="" required tabindex ="6" onchange="validar('inputPresion', 'presion', 2)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mmHg</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese una presión válida.<br>Ejemplo: 130/150</div>
                                            </div> 
                                        </div>
                                        <!--Frecuencia respiratoria-->
                                        <div class="form-group">
                                            <label for="" class="w-100">Frecuencia respiratoria</label> 
                                            <div class="input-group"> 
                                                <input type="text" name="frecuenciac" id="inputFrecuencia" class="form-control" placeholder="" required tabindex ="7" onchange="validar('inputFrecuencia', 'enteros', 3)">    
                                                <div class="input-group-append">
                                                    <span class="input-group-text">resp/min</span>
                                                </div>
                                                <div class="invalid-feedback">Ingrese una frecuencia válida.<br>Ejemplo: 16</div>
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
                                                <div class="col-8 px-1">
                                                    <label for="fechaNacimiento">Nombre del paciente</label>
                                                    <input type="text" name="" id="" value="<?php echo $_SESSION['datos'][0]['nombrePaciente'].' '.$_SESSION['datos'][0]['apellidoPaciente'];?>" class="form-control" disabled>
                                                </div>
                                                <!--DUI-->
                                                <div class="col-4 px-1">
                                                    <label for="dui">DUI</label>
                                                    <input type="text" name="dui" id="dui" value="<?php echo $_SESSION['datos'][0]['duiPaciente'];?>" class="form-control" disabled>
                                                </div> 
                                            </div>  
                                            <!-- Fila 2 --> 
                                            <div class="row form-group no-gutters">
                                                <!--Fecha de nacimiento -->
                                                <div class="col-5 px-1">
                                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $_SESSION['datos'][0]['fechaNacimiento'];?>" class="form-control" disabled>
                                                </div>
                                                <!-- Sexo -->
                                                <div class="col-4 px-1">
                                                    <label for="sexo">Sexo</label>
                                                    <input type="text" name="sexo" id="sexo" value="<?php echo $_SESSION['datos'][0]['genero'];?>" class="form-control" disabled>
                                                </div>
                                                <!--Tipo de sangre -->
                                                <div class="col-3 px-1">
                                                    <label for="tipoSangre">Tipo de sangre</label>
                                                    <input type="text" name="tipoSangre" id="tipoSangre" value="<?php echo $_SESSION['datos'][0]['tipoSangre'];?>" class="form-control" disabled>
                                                </div> 
                                        
                                            </div>                             
                                            <!-- Fila 3 -->  
                                            <div class="row form-group no-gutters">
                                                <!--Direccion -->
                                                <div class="col-9 px-1">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" name="direccion" id="direccion" value="<?php echo $_SESSION['datos'][0]['direccion'];?>" class="form-control" disabled>
                                                </div>
                                                <!--Telefono-->
                                                <div class="col-3 px-1">
                                                    <label for="telefono">Teléfono</label>
                                                    <input type="text" name="telefono" id="telefono" value="<?php echo $_SESSION['datos'][0]['telefono'];?>" class="form-control" disabled>
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
                                        <textarea name="diagnostico" class="form-control" rows="3" id="comment" tabindex ="8" required></textarea> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="col">
                                    <!--Orden-->   
                                        <div class="form-group inline-form">
                                            <label for="" class="w-50">Orden</label>
                                            
                                            <!--<select name="examenes" id="listaOrdenes" class="custom-select" required>
                                                <option value="Sin examenes">Sin examenes</option>
                                                <option value="Análisis de orina">Análisis de orina</option>
                                                <option value="Hemograma completo">Hemograma completo</option>
                                                <option value="Coprocultivo">Coprocultivo</option>
                                            </select>-->
                                            <input name="examenes" id="listaOrdenes" class="form-control" tabindex ="9">
                                            <input name="examenLista" id="listaO" class="custom-select" hidden>
                                        <button type="button" id="btn-agregar" value="Guardar" onclick="newElement();"> 
                                        
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
                                <button type="submit" name="submit" id="btn-generar" value="Guardar" class="btn-action" disabled tabindex ="10">
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
    <script>
        $(document).ready(function(){
            $('#bExp').addClass('active');
            $('#gExp').removeClass('active');
        });
    </script>
</html>