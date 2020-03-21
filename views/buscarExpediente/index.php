<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Buscar Expediente</title>
        <!-- CSS propio -->
        <link rel="stylesheet" href="public/css/buscarExpediente.css">

    </head>
    <body>
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
                        <button id="btn-refinar" name="aplicarFiltro">
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
    </body>
</html>