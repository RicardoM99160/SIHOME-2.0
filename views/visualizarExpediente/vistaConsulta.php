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
                    <h4>Consulta <?php echo ($this->consulta != "") ? $this->consulta->codigo : "no registrada" ?></h4>
                </div>

                <!--- Formulario generar consulta-->
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
                                                <label for="" class='control-label'>Motivo de consulta</label>
                                                <textarea name="motivo" class="form-control" rows="3" id="comment" tabindex ="1" disabled><?php echo ($this->consulta != "") ? $this->consulta->motivo : "Sin datos" ?>
                                                </textarea> 
                                            </div> 
                                            <!--Enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Enfermedad actual</label>
                                                <textarea name="enfermedad" class="form-control" rows="2" id="comment" tabindex ="1" disabled><?php echo ($this->consulta != "") ? $this->consulta->enfermedad : "Sin datos" ?>
                                                </textarea> 
                                            </div> 
                                            <!--Antecedentes de enfermedad actual-->
                                            <div class="form-group">
                                                <label for="" class='control-label'>Antecedentes de enfermedad actual</label>
                                                <textarea name="antecedente" class="form-control" rows="3" id="comment" tabindex ="1" disabled><?php echo ($this->consulta != "") ? $this->consulta->antecedentes : "Sin datos" ?>
                                                </textarea> 
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
                                                    <input type="text" name="temperatura" id="inputTemperatura" class="form-control" placeholder="" disabled onchange="validar('inputTemperatura', 'decimales', 0)" value="<?php echo ($this->consulta != "") ? $this->consulta->temperatura : "Sin datos" ?>">    
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
                                                <input type="text" name="pulso" id="inputPulso" class="form-control" placeholder="" disabled onchange="validar('inputPulso', 'enteros', 1)" value="<?php echo ($this->consulta != "") ? $this->consulta->pulso : "Sin datos" ?>">    
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
                                                <input type="text" name="presion" id="inputPresion" class="form-control" placeholder="" disabled onchange="validar('inputPresion', 'presion', 2)" value="<?php echo ($this->consulta != "") ? $this->consulta->presion : "Sin datos" ?>">    
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
                                                <input type="text" name="frecuenciac" id="inputFrecuencia" class="form-control" placeholder="" disabled onchange="validar('inputFrecuencia', 'enteros', 3)" value="<?php echo ($this->consulta != "") ? $this->consulta->frecuencia : "Sin datos" ?>">    
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
                                        <label for="" class='control-label'>Descripción de diagnostico</label>
                                        <textarea name="diagnostico" class="form-control" rows="3" id="comment" tabindex ="1" disabled><?php echo ($this->consulta != "") ? $this->consulta->diagnostico : "Sin datos" ?>
                                        </textarea> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="col">
                                    <!--Orden-->   
                                    <div class="form-group inline-form">
                                        <ul id="ordenesAgregados" class="lista-orden list-group">
                                            <label for="" class="w-50">Orden</label>
                                            <?php
                                                if(isset($this->consulta->ordenes)){
                                                    if(count($this->consulta->ordenes)>0){
                                                        foreach($this->consulta->ordenes as $orden){
                                            ?>
                                            <li id="orden-item" class="list-group-item d-flex justify-content-between align-items-center"><?php echo $orden['nombre'] ?>
                                            </li>
                                            <?php
                                                        }
                                                    }else{
                                            ?>
                                            <li id="orden-item" class="list-group-item d-flex justify-content-between align-items-center">No hay ordenes registradas
                                            </li>
                                            <?php
                                                    }
                                                }else{
                                            ?>
                                            <li id="orden-item" class="list-group-item d-flex justify-content-between align-items-center">Sin datos
                                            </li>
                                            <?php
                                                                                                                                            
                                                }
                                            ?>
                                        </ul>
                                        
                                   
                                    </div> 
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