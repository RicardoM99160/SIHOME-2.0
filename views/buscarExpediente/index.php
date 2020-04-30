<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Buscar Expediente</title>
        <!-- CSS slider -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/bootstrap-slider.css">
        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/buscarExpediente.css">
    </head>
    <?php require 'views/modo.php'?>
    <body>
        <!-- Script slider -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/bootstrap-slider.js"></script>
        <!-- Validaciones -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/validaciones.js"></script>

        <?php require 'views/plantillaBase.php'?>

        <div class="wrapper">

            <?php require 'views/barraLateral.php' ?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina">
                    <h4>Buscar un expediente</h4>
                </div>

                <!-- Form para realizar búsqueda -->
                <form id="form-buscador" class="w-100 d-flex" action="<?php echo constant('URL');?>buscarExpediente/buscarE" method="POST">


                    <div class="form-group w-50 px-2 d-block"> 
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="searchIcon"><i class="fas fa-search" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="Número del expediente">
                        </div>
                    </div>

                    <div class="form-group d-inline-flex ml-auto">
                        <button type="button" class="btn btn-primary" id="btn-refinar" name="aplicarFiltro" data-toggle="modal" data-target="#modalFiltros">
                            <i class="fas fa-sliders-h"></i>
                            Refinar búsqueda 
                        </button>
                    </div>
                </form>

                <!-- Tabla de resultados de búsqueda-->
                <div id="cont-table">
                <table class="table table-borderless borderless">
                    <thead class="thead">
                    <!-- Encabezados de tabla-->
                      <tr>
                        <th scope="col"> #</th>
                        <th scope="col">Código de historia</th>
                        <th style="width: 20%;" scope="col">Paciente</th>
                        <th scope="col">DUI</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Ultima consulta</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once 'models/expediente.php';
                            $i = 1;
                            if(isset($this->expedientes) && count($this->expedientes) > 0){
                                foreach($this->expedientes as $row){
                                    $expediente = new Expediente();
                                    $expediente = $row;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $expediente->codigo; ?></td>
                            <td><?php echo $expediente->nombre; ?></td>
                            <td><?php echo $expediente->dui; ?></td>
                            <td><?php echo $expediente->fechaCreacion; ?></td>
                            <td><?php echo $expediente->ultimaConsulta; ?></td>
                            <td>
                                <a class="btn btn-default" href="<?php echo constant('URL') . 'visualizarExpediente/mostrarExpediente/' . $expediente->codigo; ?>">
                                    <i class="fas fa-external-link-alt"></i>
                                </a> 
                            </td>
                        </tr>
                        <?php 
                                    $i++; 
                                }
                            }else{     
                        ?>
                        <tr>
                            <th colspan=6><?php echo $this->mensaje;?><th>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                  </table>
                </div>  
            </div>
        </div>

        <!-- Script para limitar el ingreso de caracteres del expediente -->
        <script type="text/javascript">
            //Input solo con números
            document.getElementById('inputFiltro').addEventListener('keydown', function(e) {
                const regex = RegExp('[0-9]');
                //console.log(e.key.toString());
                if (!regex.test(e.key) && e.key.toString() != 'Backspace' && e.key.toString() != 'Enter' && e.key.toString() != 'P')
                {
                    e.preventDefault();
                }
            });
        </script> 

        <!-- Ventana modal de filtros -->
        <div class="modal fade" id="modalFiltros" tabindex="-1" role="dialog" aria-labelledby="modalFiltrosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content"> 
                    <div class="modal-body"> 
                        <!-- Contenido -->
                        <form id="frm-filtro" method="POST">
                            <div class="col">
                                <!---Filtro de antiguedad -->
                            <div class="modal-seccion">
                                <div class="row"> 
                                    <h6 class="modal-seccion-title">Filtrar por antiguedad</h6> 
                                </div>
                                <div class="row">  
                                    <div class="col-md-4">
                                        <div class="form form-inline">
                                            <input type="radio" name="antiguedad" id="nuevos" value="1"> 
                                            <label class="form-check-label" for="antiguedad">Más nuevos primero</label> 
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form form-inline">
                                            <input type="radio" name="antiguedad" id="antiguos" value="2">   
                                            <label class="form-check-label" for="antiguedad">Más antiguos primeros</label> 
                                        </div>  
                                    </div>
                                </div>  
                            </div>
                            <!---Filtro de cita -->
                            <div class="modal-seccion">
                            <div class="row"> 
                                    <h6 class="modal-seccion-title">Fecha estimada de ultima cita</h6> 
                                </div>
                                <div class="form-inline"> 
                                        <!-- Columna --> 
                                            <div class="form-inline">
                                                <span style="margin-right: 2%">Entre</span>
                                                <input type="date" id="filtroFecha1" name="fecha1" class="form-control d-inline-flex w-75" min="1900-01-01" max="" onclick="validarFecha('filtroFecha1')">
                                            </div> 
                                        <div class='col-md-4'> 
                                                <span style="margin-right: 2%">y</span>
                                                <input type="date" id="fitroFecha2" name="fecha2" class="form-control d-inline-flex w-75" min="1900-01-01" max="" onclick="validarFecha('fitroFecha2')">
                                            </div> 
                                </div> 
                                </div>
                                
                            <div class="modal-seccion">
                                <!---Filtro de edad -->
                                <div class="row"> 
                                    <h6 class="modal-seccion-title">Filtrar por edad</h6>
                                    <input type="checkbox" name="filtrarEdades" value="1" class="d-inline-flex align-self-center w-25">
                                </div>
                                <div class="row justify-content-center" id="modal-slider-seccion">
                                    <div class='col-md-10'>
                                        <div class="form-inline form-group ">
                                            <input id="sliderDoble" name="edad" type="text" class="span2" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1,18]" style="width: 100%" />
                                        </div>
                                    </div>
                                </div> 
                                <!---Filtro por fecha de ultima cita -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" id="btn-reset" style="display: none;">Resetear campos</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn-action" name="filtros" id="filtros">Aplicar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--Form de filtros-->
    <?php
        if(isset($_POST['filtros']))
        {
            $rango = $_POST['edad'];

            if(isset($_POST['antiguedad'])) $orden = $_POST['antiguedad'];
            else $orden = null;
            if(isset($_POST['fecha1'])) $fecha1 = $_POST['fecha1'];
            else $fecha1 = null;
            if(isset($_POST['fecha2'])) $fecha2 = $_POST['fecha2'];
            else $fecha2 = null;
            if(isset($_POST['filtrarEdades'])) $filtrarEdad = $_POST['filtrarEdades'];
            else $filtrarEdad = null;

            //Obtener edades por separado
            $edades = explode(",", $rango);
            $edad1 = $edades[0];
            $edad2 = $edades[1];

            //Elegir variables a usar
            
            //***Todos los filtros
            if($orden != null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad != null)
            {

            }

            //***Sólo orden
            if($orden != null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad == null)
            {
            }

            //***Orden y fecha
            elseif ($orden != null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad == null)
            {

            }

            //***Orden y edades
            elseif ($orden != null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad != null)
            {

            }

            //***Sólo fecha
            elseif ($orden == null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad == null)
            {

            }

            //***Fecha y edades
            elseif ($orden == null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad != null)
            {

            }

            //***Sólo edades
            elseif ($orden == null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad != null)
            {

            }
        }

        //Función para probar que se guardan las variables
        /*function alert($msg)
        {
            if($msg != null) echo "<script type='text/javascript'>console.log('$msg');</script>";
        }*/
        ?>

        <!-- Inicialización de slider -->
        <script type="text/javascript">
            var slider = new Slider('#sliderDoble', 
            {
                tooltip: 'always',
                formatter: function(value) {
                return formatoRango(value);
                }
            });
        </script>
        
    </body>
    <script>
        $(document).ready(function(){
            $('#bExp').addClass('active');
            $('#gExp').removeClass('active');
        });
    </script>
</html>