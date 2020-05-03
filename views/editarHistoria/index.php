<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Editar historia clinica</title>

        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/editarHistoria.css">
    </head>

    <body> 
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                <?php
                    include_once 'models/expediente.php';
                    if(isset($this->expediente) && $this->expediente != ""){
                        $expediente = new Expediente();
                        $expediente = $this->expediente; 
                    
                ?>
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina"> 
                    <h4>Modificar historial -> <small>Expediente <?php echo $expediente->codigo; ?></small></h4>
                </div>
                <?php 
                    if(isset($_POST['submit']) && $_POST['submit'] == "Guardar")    { 
                ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            Los cambios han sido implementados.
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                <?php                    
                    }
                ?>
                <!--=========== Formulario generar consulta=============-->
                <form id="form-generarConsulta" action="" method="POST">
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
                                                <textarea name="motivo" class="form-control" rows="3" id="comment" tabindex ="1" required></textarea> 
                                            </div> 
                                            <!--Enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Enfermedad actual*</label>
                                                <textarea name="enfermedad" class="form-control" rows="2" id="comment" tabindex ="1" required></textarea> 
                                            </div> 
                                            <!--Antecedentes de enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Antecedentes de enfermedad actual</label>
                                                <textarea name="antecedente" class="form-control" rows="3" id="comment" tabindex ="1"></textarea> 
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
                                                    <input type="text" name="temperatura" id="inputTemperatura" class="form-control" placeholder="" required onchange="validar('inputTemperatura', 'decimales', 0)">    
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
                                                <input type="text" name="pulso" id="inputPulso" class="form-control" placeholder="" required onchange="validar('inputPulso', 'enteros', 1)">    
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
                                                <input type="text" name="presion" id="inputPresion" class="form-control" placeholder="" required onchange="validar('inputPresion', 'presion', 2)">    
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
                                                <input type="text" name="frecuenciac" id="inputFrecuencia" class="form-control" placeholder="" required onchange="validar('inputFrecuencia', 'enteros', 3)">    
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
                         <!--=========================Datos de paciente===========================================================-->
                         <div class="seccionFormulario card">
                                <h5 class="font-tituloSeccion card-header text-center">Datos de paciente</h5>
                                <div class="frm-seccion card-body">   
                                    <div class="col"> 
                                            <!--Fila 1-->  
                                          <div class="row form-group no-gutters">
                                                <!--Nombre completo -->
                                                <div class="col-8 px-1">
                                                    <label for="fechaNacimiento">Nombre del paciente</label>
                                                    <input type="text" name="" id="" value="<?php echo $expediente->nombre; ?>" class="form-control" disabled>
                                                </div>
                                                <!--DUI-->
                                                <div class="col-4 px-1">
                                                    <label for="dui">DUI</label>
                                                    <input type="text" name="dui" id="dui" value="<?php echo $expediente->dui; ?>" class="form-control" disabled>
                                                </div> 
                                            </div>  
                                            <!-- Fila 2 --> 
                                            <div class="row form-group no-gutters">
                                                <!--Fecha de nacimiento -->
                                                <div class="col-5 px-1">
                                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $expediente->fechaNacimiento; ?>" class="form-control" disabled>
                                                </div>
                                                <!-- Sexo -->
                                                <div class="col-4 px-1">
                                                    <label for="sexo">Sexo</label>
                                                    <input type="text" name="sexo" id="sexo" value="<?php echo $expediente->genero; ?>" class="form-control" disabled>
                                                </div>
                                                <!--Tipo de sangre -->
                                                <div class="col-3 px-1">
                                                    <label for="tipoSangre">Tipo de sangre</label>
                                                    <input type="text" name="tipoSangre" id="tipoSangre" value="<?php echo $expediente->tipoSangre; ?>" class="form-control" disabled>
                                                </div>                                         
                                            </div>                             
                                            
                                    </div>
                                </div> 
                        </div>

                        <?php                    
                            }
                        ?> 
                        <!-- Boton GENERAR-->
                        
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

                <?php
    /*
                include 'libs/datosConsultas.php';
                $guardar = new consulta();

                    if(isset($_POST['submit']) && $_POST['submit'] == "Guardar"){
                        $motivoConsulta = $_POST['motivo'];
                        $enfermedad = $_POST['enfermedad'];
                        $antecedente = $_POST['antecedente'];

                        $temperatura = $_POST['temperatura'];
                        $presion = $_POST['presion'];
                        $pulso = $_POST['pulso'];
                        $frecuencia = $_POST['frecuenciac'];

                        $diagnostico = $_POST['diagnostico'];
                        $orden = $_POST['examenes'];

                        $guardar->guardarConsultas($motivoConsulta, $enfermedad, $antecedente, $temperatura, $presion, $pulso, $frecuencia, $diagnostico, $orden);
                    }
                    
                */
                ?>
                   
                   
                
                
                 
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