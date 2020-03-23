<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Buscar Expediente</title>
        <!-- CSS slider -->
        <link rel="stylesheet" href="public/css/bootstrap-slider.css">
        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/buscarExpediente.css">
    </head>
    <body>
        <!-- Script slider -->
        <script type="text/javascript" src="public/js/bootstrap-slider.js"></script>
        <!-- Validaciones -->
        <script type="text/javascript" src="public/js/validaciones_buscar.js"></script>

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
                <form id="form-buscador" class="w-100 d-flex">


                    <div class="form-group w-50 px-2 d-block"> 
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
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
                        <th sscope="col">DUI</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Ultima consulta</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>000000</td>
                        <td>Nombre del paciente</td>
                        <td>00000000-0</td>
                        <td>día-mes-año</td>
                        <td>día-mes-año</td>
                        <td>
                            <a class="btn btn-default" href="">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>000000</td>
                        <td>Nombre del paciente</td>
                        <td>00000000-0</td>
                        <td>día-mes-año</td>
                        <td>día-mes-año</td>
                        <td>
                            <a class="btn btn-default" href="">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>000000</td>
                        <td>Nombre del paciente</td>
                        <td>00000000-0</td>
                        <td>día-mes-año</td>
                        <td>día-mes-año</td>
                        <td>
                            <a class="btn btn-default" href="">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>000000</td>
                        <td>Nombre del paciente</td>
                        <td>00000000-0</td>
                        <td>día-mes-año</td>
                        <td>día-mes-año</td>
                        <td>
                            <a class="btn btn-default" href="">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>  
            </div>

        </div>

        <!-- Script para limitar el ingreso de caracteres del expediente-->
        <script type="text/javascript">
            //Input solo con números
            document.getElementById('inputFiltro').addEventListener('keydown', function(e) {
                const regex = RegExp('[0-9]');
                //console.log(e.key.toString());
                if (!regex.test(e.key) && e.key.toString() != 'Backspace')
                {
                    e.preventDefault();
                }
            });
        </script>

        <!-- Ventana modal de filtros -->
        <div class="modal fade" id="modalFiltros" tabindex="-1" role="dialog" aria-labelledby="modalFiltrosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalFiltrosLabel"><b>Filtros disponibles</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido -->
                        <form class="form-group">
                            
                            <!-- Seccion antiguedad -->
                            <div class="card">
                                <h5 class="font-tituloSeccion card-header">Filtrar por antiguedad</h5>
                                <div class="frm-seccion card-body">
                                    <!-- Fila -->
                                    <div class="row"> 
                                        <!-- Columna -->
                                        <div class='col-md-6'>
                                            <div class="form-group">
                                                <input type="radio" class="custom-radio" name="antiguedad" id="nuevos" required>
                                                <label for="nuevos">Más nuevos primero</label>
                                            </div>
                                        </div>
                                        <!-- Columna -->
                                        <div class='col-md-6'>
                                            <div class="form-group">
                                                <input type="radio" class="custom-radio" name="antiguedad" id="antiguos" required>
                                                <label for="antiguos">Más antiguos primero</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Seccion edad -->
                            <div class="card">
                                <h5 class="font-tituloSeccion card-header">Filtrar por edad</h5>
                                <div class="frm-seccion card-body">
                                    <!-- Fila -->
                                    <div class="row"> 
                                        <!-- Columna -->
                                        <div class='col w-100'>
                                            <div class="form-group">
                                                    <input id="sliderDoble" type="text" class="span2" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1,18]" style="width: 100%" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Seccion fecha ultima cita -->
                            <div class="card">
                                <h5 class="font-tituloSeccion card-header">Fecha estimada de ultima cita</h5>
                                <div class="frm-seccion card-body">
                                    <!-- Fila -->
                                    <div class="row"> 
                                        <!-- Columna -->
                                        <div class='col-md-6 w-75'>
                                            <div class="form-group">
                                                <span style="margin-right: 2%">Entre</span>
                                                <input type="date" id="filtroFecha1" class="form-control d-inline-flex w-75" min="1900-01-01" max="" onclick="validarFecha('filtroFecha1')">
                                            </div>
                                        </div>
                                        <!-- Columna -->
                                        <div class='col-md-6 w-75'>
                                            <div class="form-group">
                                                <span style="margin-right: 10%; margin-left: 2%">y</span>
                                                <input type="date" id="fitroFecha2" class="form-control d-inline-flex w-75" min="1900-01-01" max="" onclick="validarFecha('fitroFecha2')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="btn-reset" style="display: none;">Resetear campos</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-dark">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Inicialización de slider -->
        <script type="text/javascript">
            var slider = new Slider('#sliderDoble', 
            {
                tooltip: 'always',
                formatter: function(value) {
                return 'Rango de edades: ' + formatoRango(value);
                }
            });
        </script>
    </body>
</html>