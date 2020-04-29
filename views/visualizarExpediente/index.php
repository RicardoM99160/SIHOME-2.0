<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Visualizar Expediente</title>
        
        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/visualizarExpediente.css">

    </head>
    <body>
        <!-- Validaciones -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/validaciones.js"></script>
        
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?> 
            <div id="contenido">
                <!--Informacion general de paciente -->
                <?php
                    include_once 'models/expediente.php';
                    if(isset($this->expediente)){
                        $expediente = new Expediente();
                        $expediente = $this->expediente;
                ?>
                <div id="ruta">
                    <h6><a href="">Buscar expediente</a> > <span>EXPEDIENTE <?php echo $expediente->codigo; ?></span></h6>
                </div>
                
                <div id="cont-infoGeneral" class="informacion-expediente">
                <div class="row px-3 py-3 no-gutters">
                    <div class="col-9"> 
                            <div class="row my-2">
                                <!-- Nombre completo -->
                                <div class="col"> 
                                    <h3 id="font-nombreCompleto"><?php echo $expediente->nombre; ?></h3>
                                </div> 
                            </div>
                            <hr>
                            <!-- Fila 1 --> 
                            <div class="row form-group no-gutters">
                                <!--Fecha de nacimiento -->
                                <div class="col-3 px-1">
                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value='<?php echo $expediente->fechaNacimiento; ?>' class="form-control" disabled>
                                </div>
                                <!-- Sexo -->
                                <div class="col-2 px-1">
                                    <label for="sexo">Sexo</label>
                                    <input type="text" name="sexo" id="sexo" value="<?php echo $expediente->genero; ?>" class="form-control" disabled>
                                </div>
                                <!--DUI-->
                                <div class="col-3 px-1">
                                    <label for="dui">DUI</label>
                                    <input type="text" name="dui" id="dui" value='<?php echo $expediente->dui; ?>' class="form-control" disabled>
                                </div>
                                <!--Tipo de sangre -->
                                <div class="col-2 px-1">
                                    <label for="tipoSangre">Tipo de sangre</label>
                                    <input type="text" name="tipoSangre" id="tipoSangre" value="<?php echo $expediente->tipoSangre; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <!-- Fila 2 --> 
                            <div class="row form-group no-gutters">
                                <!--Direccion -->
                                <div class="col-7 px-1">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" value="<?php echo $expediente->direccion; ?>" class="form-control" disabled>
                                </div>
                                <!--Telefono-->
                                <div class="col-3 px-1">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" value="<?php echo $expediente->telefono; ?>" class="form-control" disabled>
                                </div>
                            </div>
                    </div>         
                </div>
                <?php
                    }else{
                ?>
                <div class="row px-3 py-3 no-gutters">
                    <div class="col-9">
                        <div class="row my-2">
                            <!-- mensaje error -->
                            <h3 id="font-nombreCompleto">No se ha encontrado información</h43>
                        </div> 
                    </div>
                </div> 
                <?php } ?>

                    <!--Enlace para ultima consulta -->

                    <div class="cont-ultimaConsulta row no-gutters mb-3">
                        <div class="col d-flex justify-content-center">
                            <p class="px-1"><b>Ultima consulta:</b></p>
                            <p class="px-1">Recibida el <u>15 de Mayo de 2019</u> en <u>Instituto Médico San Marcos</u></p>
                            <a class="link-ext" href="">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </div>
                    </div>
          
                    <!--Panel de navegacion tabular -->
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="consulta-tab" data-toggle="tab" href="#home" role="tab" aria-controls="consultas" aria-selected="true">Histórico de Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="clinico-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historial Clínico</a>
                        </li> 
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <!--Pestaña 1  - Historial de consultas-->
                        <div class="tab-pane fade show active" id="consultas" role="tabpanel" aria-labelledby="home-tab"> 
                            <div id="historialConsulta" class="px-3">
                                <h5 class="titulo-seccion mt-3 mb-4">
                                    <svg id="i-folder" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="27" height="27" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                                    </svg>
                                    <!--Número de consultas --->
                                    <?php
                                        include 'libs/datosConsultas.php';
                                        include 'libs/datosClinicos.php';
                                        $clinico = new datosClinicos();
                                        $buscar = new consulta();
                                        $numC = $buscar->nConsultas($_SESSION['idPaciente']);
                                        echo '<span><b>Consultas Registradas ('.$numC.') </b></span>';
                                        ?>
                                </h5>
                                <!--Formulario de opciones -->
                                <form action="POST" class="row form-group inline-form">
                                    <!--input parametro busqueda -->
                                    <div class="col-3"> 
                                        <div class="input-group filtro">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="Buscar...">    
                                        </div>
                                    </div> 
                                    <!--Boton filtro -->   
                                    <div class="form-group">
                                        <button id="btn-refinar" name="aplicarFiltro">
                                            <i class="fas fa-sliders-h"></i>
                                            <span> Refinar búsqueda </span>
                                        </button>
                                    </div>
                                    <!--Boton nueva consulta -->   
                                    <div class="form-group">
                                        <a id="btn-nuevaConsulta" href="<?php echo constant('URL');?>generarConsulta">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span>Nueva consulta</span>
                                        </a>
                                    </div> 
                                </form>
                                <!--Tabla de consultas-->
                                <div id="cont-table">
                                    <table class="table table-hover borderless align-midle ">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Código de consulta</th>
                                                <th scope="col">Doctor encargado</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Hora</th>
                                                <th scope="col">Comentario</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                <?php
                                $buscar->listarConsultas($_SESSION['idPaciente']);
                                ?>
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <!--Historial de clinico-->
                    <div id="historialClinico" class="row px-3 py-3">
                        <div class="col">

                            <!--HABITOS TOXICOS -->
                            <form>
                            <div id="habitosToxicos" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <!--Titulo de seccion -->
                                        <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Habitos Toxicos</span>
                                            <!--Boton modificar seccion-->
                                            <button id="btn-modificarHabitos" name="edit_historia" class="btn btn-light">
                                                <i class="fas fa-edit"></i>
                                            </button>  
                                            
                                        </h5>
                                    </div>
                                </div>
                                <!--Menu para agregar una categoria/comentario habitos-toxicos-->
                                <div class="d-none row inline-form" id="cont-agregarToxico">  
                                    <div class="form-group"> 
                                        <!--Combo box de categorias -->
                                        <label for="" class="w-100">Categoria</label>
                                            <select name="examenes" id="slt-listaToxicos" class="custom-select" required>
                                            </select>
                                    </div>
                                    <!--Observaciones input -->
                                    <div class="form-group">  
                                        <label for="" class="">Observaciones*</label>    
                                        <div class="input-group">  
                                            <input type="text" id="input-observacionToxico" class="form-control" placeholder="" required>   
                                            <button type="button" id="btn-agregarToxico" class="btn-agregarCategoria"> 
                                                <i class="fas fa-plus-circle"></i>
                                                <span>Agregar</span>
                                            </button> 
                                            <button id="btn-guardarHabitos"class="d-none btn-action">
                                                <i class="fas fa-save"></i>
                                                <span>Guardar cambios</span>
                                            </button>  
                                            
                                        </div> 
                                    </div>  
                                </div>  
                               
                                <!--Cuando no hay observaciones debe de ir lo siguiente 
                                <div class="row no-gutters my-2" id="noRegistro"> 
                                    <p>Aun no hay hábitos tóxicos registrados</p>
                                </div> 
                                -->
                                <!--Plantilla de habito--> 
                                <div class="nodo row no-gutters my-2"> 
                                </div>


                            </div>
                        </form>




                            <hr>
                            <!--HABITOS FISIOLOGICOS -->
                            <div id="habitosFisiologicos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Habitos Fisiologicos</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                 
                                <?php 
                                      $clinico->obtenerFisiologicos($_SESSION['idPaciente']);
                                ?>
                            </div>
                            <hr>

                            <!--ENFERMEDADES DE LA INFANCIA -->
                            <div id="enfermedadesInfancia" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades de la infancia</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php 
                                      $clinico->obtenerInfancia($_SESSION['idPaciente']);
                                ?>
                            </div>
                            <hr>

                            <!--ENFERMEDADES -->
                            <div id="enfermedades" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit" ></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php 
                                      $clinico->obtenerEnfermedad($_SESSION['idPaciente']);
                                ?>
                            </div>
                            <hr>

                             <!--ALERGIAS -->
                            <div id="alergias" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Alergías</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <ul class="list-group" id="list-alergias">
                                            <?php 
                                                $clinico->obtenerAlergias($_SESSION['idPaciente']);
                                            ?> 
                                        </ul> 
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                             <!-- ANTECEDENTES-->
                            <div id="antecedentes" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Antecedentes heredofamiliares</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php 
                                      $clinico->obtenerAntecedentes($_SESSION['idPaciente']);
                                ?>
                            </div>
                            <!-- MEDICAMENTOS -->
                            <div id="medicamentos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Medicamentos</span>
                                            <button class="btn btn-light" name="edit_historia">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <div id="medicamentosDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <?php
                                                $clinico->obtenerMedicamentos($_SESSION['idPaciente']);    
                                            ?>                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="public/js/parametros_clinicos.js"></script>
        <script>
            $(document).ready(function () {
                $('#consulta-tab').on('click', function () {
                    $('#historialConsulta').show();
                    $('#historialClinico').hide();
                    $('#historialCirugia').hide();
                });

                $('#clinico-tab').on('click', function () {
                    $('#historialConsulta').hide();
                    $('#historialClinico').show();
                    $('#historialCirugia').hide();
                });

                $('#cirugia-tab').on('click', function () {
                    $('#historialConsulta').hide();
                    $('#historialClinico').hide();
                    $('#historialCirugia').show();
                });
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