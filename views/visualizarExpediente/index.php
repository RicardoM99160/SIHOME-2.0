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
                    if(isset($this->expediente) && $this->expediente != ""){
                        $expediente = new Expediente();
                        $expediente = $this->expediente;
                ?>
                <div id="ruta">
                    <h6><a href="">Buscar expediente</a> > <span>EXPEDIENTE <?php echo $expediente->codigo; ?></span></h6>
                </div>
                
                <div id="cont-infoGeneral" class="informacion-expediente">
                    <!--====================Botones para modificar y crear ===============================--> 

                    <div class="row px-3 py-3 no-gutters">  
                        <!--Boton nueva consulta -->   
                        <a id="btn-nuevaConsulta" href="<?php echo constant('URL');?>generarConsulta">
                            <i class="fas fa-pencil-alt"></i>
                            <span>Nueva consulta</span>
                        </a>   
                        <!--Boton modificar historial clinico -->   
                        <a id="btn-nuevaConsulta" href="<?php echo constant('URL').'editarHistoria/recuperarExpediente/'.$expediente->codigo;?>">
                            <i class="fas fa-file-alt"></i>
                            <span>Modificar historial clinico</span>
                        </a>                    
                    </div>
                    
 
                 
        <!--====================Informacion general de paciente ===============================--> 

                <div class="row px-3 py-3 no-gutters">                   
                    <div class="col-12"> 
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
                    <div class="col-12">
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
                                        if(isset($this->consultas) && count($this->consultas) > 0){
                                            echo '<span><b>Consultas Registradas ('.count($this->consultas).') </b></span>';
                                        }else{
                                            echo '<span><b>Consultas Registradas (0) </b></span>';
                                        }
                                    ?>
                                </h5>
                                <!--Formulario de opciones -->
                                <form action="POST" class="row form-group inline-form">
                                    <!--input parametro busqueda -->
                                    
                                    
                                        <div class="col-6">                                             
                                                               
                                            <div class="input-group filtro">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="Buscar...">    
                                            </div>
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
                                            <?php
                                                include_once 'models/consulta.php';
                                                if(isset($this->consultas) && count($this->consultas) > 0){
                                                    $i = 1;
                                                    foreach($this->consultas as $row){
                                                        $consulta = new Consulta();
                                                        $consulta = $row;
                                            ?>
                                            <tr>
                                                <th scope="row" class="borderless"><?php echo $i; ?></th>
                                                <td><?php echo $consulta->codigo; ?></td>
                                                <td><?php echo $consulta->doctorEncargado; ?></td>
                                                <td><?php echo $consulta->fecha; ?></td>
                                                <td><?php echo $consulta->hora; ?></td>
                                                <td><?php echo $consulta->motivo; ?></td>
                                                <td>
                                                    <a class="btn btn-default" href="<?php echo constant('URL') . 'visualizarExpediente/mostrarConsulta/' . $consulta->codigo;?>">
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
                                                <th colspan="6">No se han encontrado Consultas<td>
                                            </tr>
                                            <?php } ?>
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
                                        </h5>
                                    </div>
                                </div> 
                                <?php
                                    include_once 'models/historialClinico.php';
                                    if(isset($this->historialClinico) && count($this->historialClinico->habitosToxicos) > 0){
                                        foreach($this->historialClinico->habitosToxicos as $habitoT){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="alcoholH" id="alcoholHabito" class="form-control text-uppercase text-center" value="<?php echo $habitoT['nombre']; ?>" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="alcoholV" id="alcoholValor" class="form-control" value="<?php echo $habitoT['detalle']; ?>" disabled>
                                    </div>
                                </div>
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroHT"> 
                                    <p>Aun no hay hábitos tóxicos registrados</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?>
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
                                        </h5>
                                    </div>
                                </div>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->habitosFisiologicos) > 0){
                                        foreach($this->historialClinico->habitosFisiologicos as $habitoF){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="habitoN" id="habitoNombre" class="form-control text-uppercase text-center" value="<?php echo $habitoF['nombre']?>" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="habitoV" id="habitoValor" class="form-control" value="<?php echo $habitoF['detalle']?>" disabled>
                                    </div>
                                </div>
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroHF"> 
                                    <p>Aun no hay hábitos fisiológicos registrados</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?>
                            </div>
                            <hr>

                            <!--ENFERMEDADES DE LA INFANCIA -->
                            <div id="enfermedadesInfancia" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades de la infancia</span>                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->enfermedadesInfancia) > 0){
                                        foreach($this->historialClinico->enfermedadesInfancia as $enfermedadI){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="enfermedad1I" id="enfermedad1Infancia" class="form-control text-uppercase text-center h-100" value="<?php echo $enfermedadI['nombre']?>" disabled>
                                    </div>
                                    <div class="col-7">
                                        <div id="enfermedad1IDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">Diagnosticado el <?php echo $enfermedadI['fecha']?></p>
                                            <p><?php echo $enfermedadI['detalle']?></p>                                     
                                        </div>
                                    </div>
                                </div>
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroEI"> 
                                    <p>Aun no hay enfermedades de la infancia registradas</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?>
                            </div>
                            <hr>

                            <!--ENFERMEDADES -->
                            <div id="enfermedades" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades</span>
                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->enfermedades) > 0){
                                        foreach($this->historialClinico->enfermedades as $enfermedad){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="enfermedad1" id="enfermedad1" class="form-control text-uppercase text-center h-100" value="<?php echo $enfermedad['nombre']?>" disabled>
                                    </div>
                                    <div class="col-7">
                                        <div id="enfermedad1Descripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">Diagnosticado el <?php echo $enfermedad['fecha']?></p>
                                            <p><?php echo $enfermedad['detalle']?></p>                                     
                                        </div>
                                    </div>
                                </div>
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroE"> 
                                    <p>Aun no hay enfermedades registradas</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?>
                            </div>
                            <hr>

                             <!--ALERGIAS -->
                            <div id="alergias" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Alergías</span>                                            
                                        </h5>
                                    </div>
                                </div>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->alergias) > 0){
                                        foreach($this->historialClinico->alergias as $alergia){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <ul class="list-group" id="list-alergias">
                                            <li class="list-group-item"><?php echo $alergia['nombre']?></li>
                                        </ul> 
                                    </div>
                                </div>
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroA"> 
                                    <p>Aun no hay alergias registradas</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?>
                            </div>
                            <hr>
                            <!-- MEDICAMENTOS -->
                            <div id="medicamentos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Medicamentos</span>                              
                                        </h5>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <div id="medicamentosDescripcion" class="px-3 py-3 form-control campo-descriptivo">   
                                            <?php
                                                if(isset($this->historialClinico) && count($this->historialClinico->medicamentos) > 0){
                                                    foreach($this->historialClinico->medicamentos as $medicamento){
                                            ?>
                                            <p class="font-weight-bold"><?php echo $medicamento['nombre'] ?></p>
                                            <p><?php echo $medicamento['dosis'] ?></p>
                                            <?php       
                                                    }
                                                }else{
                                            ?>  
                                                <p>No se le suministran medicamentos</p>
                                            <?php                                 
                                                }                                
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