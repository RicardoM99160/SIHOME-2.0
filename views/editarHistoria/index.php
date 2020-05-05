<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Editar historia clinica</title>

        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/editarHistoria.css">
        <!-- Archivos js -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/historia.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                    <h4>Modificar historia clinica -> <small>Expediente <?php echo $expediente->codigo; ?></small></h4>
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
                    <div class="row " style="min-height:0;">   
                        <!--========================= HISTORIA CLINICA ===========================================================-->
                        <div class="col-md-12" id="col_izquierda"> 

                            <!--========================= HABITOS TOXICOS ===========================================================-->
                            <div id="habitosToxicos" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <!--Titulo de seccion -->
                                        <h5 class="titulo-seccion  text-uppercase">
                                            <span class="seccion-clinica pr-2">Habitos Toxicos</span>                                             
                                        </h5>
                                    </div>
                                </div> 
                                <!--Fila -->  
                                
                                <form method="POST" action="<?php echo constant('URL');?>editarHistoria/insertarHabito">
                                    <div class="row no-gutters my-2">
                                        <div class="col-2 px-1">
                                            <label for="HT_nTipo">Tipo</label>
                                            <select class="form-control" name="nombreHT">
                                                <option>ALCOHOL</option>
                                                <option>DROGAS VARIAS</option>
                                                <option>TABACO</option>
                                                <option>INFUSIONES</option>
                                                <option>OTROS HABITOS</option>
                                            </select>
                                        </div>
                                        <div class="col-6 px-1">
                                            <label for="HT_nObs">Observación</label>
                                            <input type="text" id="alcoholValor" class="form-control" name="detalleHT">                                       
                                        </div>     
                                        <div class="col-2">                                    
                                            <button type="submit" name="nuevoHT" value="HT"  onclick="DoAjaxPostAndMore(this)" class="btn-action agregar">                                         
                                                <i class="fas fa-plus-circle"></i>
                                                Agregar
                                            </button> 
                                            <button type="submit" name="editar" value="HT" class="btn-action aceptar" onclick="ola()" disabled>                                         
                                                <i class="fas fa-check-square"></i>
                                                Aceptar
                                            </button> 
                                        </div>                                  
                                    </div> 
                                </form>
                                <br>
                                <?php
                                    include_once 'models/historialClinico.php';
                                    if(isset($this->historialClinico) && count($this->historialClinico->habitosToxicos) > 0){
                                        foreach($this->historialClinico->habitosToxicos as $habitoT){
                                ?>                               

                                <div class="row no-gutters my-2">
                                    <div class="col-3">
                                        <input type="text" class="form-control text-uppercase text-center" value="<?php echo $habitoT['nombre']; ?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" value="<?php echo $habitoT['detalle']; ?>" disabled>
                                    </div> 
                                    <button type="button"  class="btnCirculo editar"> 
                                        <i class="fas fa-edit"></i>
                                    </button>  
                                    <button type="button" class="btnCirculo eliminar"> 
                                        <i class="fas fa-trash-alt"></i>
                                    </button> 
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
                                <br><hr>
                               

                            </div>
                                    
                             <!--========================= HABITOS FISIOLOGICOS ===========================================================-->
                             <div id="habitosFisiologicos" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <!--Titulo de seccion -->
                                        <h5 class="titulo-seccion  text-uppercase">
                                            <span class="seccion-clinica pr-2">Habitos FisiolÓgicos</span>                                             
                                        </h5>
                                    </div>
                                </div> 
                                <!--Fila -->
                                <form method="POST" action="<?php echo constant('URL');?>editarHistoria/insertarHabito">
                                <div class="row no-gutters my-2">
                                    <div class="col-2 px-1">
                                        <label for="HT_nTipo">Tipo</label>
                                        <select class="form-control" name="nombreHF" >
                                            <option>ALIMENTACION</option>
                                            <option>DIURESIS</option>
                                            <option>CATARSIS</option>
                                            <option>SUEŃO</option>
                                            <option>SEXUALIDAD</option>
                                            <option>EJERCICIO</option>
                                            <option>OTROS HABITOS</option>
                                        </select>
                                    </div>
                                    <div class="col-6 px-1">
                                        <label for="HT_nObs">Observación</label>
                                        <input type="text" class="form-control" name="detalleHF">                                       
                                    </div>     
                                    <div class="col-2">                                          
                                        <button type="submit"  class="btn-action agregar" name="nuevoHF" value="HF">                                         
                                            <i class="fas fa-plus-circle"></i>
                                            Agregar
                                        </button> 
                                        <button type="button" onclick=""  class="btn-action aceptar">                                         
                                            <i class="fas fa-check-square"></i>
                                            Aceptar
                                        </button> 
                                    </div>                                  
                                </div> 
                                </form>
                                <br>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->habitosFisiologicos) > 0){
                                        foreach($this->historialClinico->habitosFisiologicos as $habitoF){
                                ?>
                                <div class="row no-gutters my-2">
                                    <div class="col-3">
                                        <input type="text" class="form-control text-uppercase text-center" value="<?php echo $habitoF['nombre']?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" value="<?php echo $habitoF['detalle']?>" disabled>
                                    </div> 
                                    <button type="button"  class="btnCirculo editar"> 
                                        <i class="fas fa-edit"></i>
                                    </button>  
                                    <button type="button" class="btnCirculo eliminar"> 
                                        <i class="fas fa-trash-alt"></i>
                                    </button> 
                                </div>
                                
                                <?php       
                                        }
                                    }else{
                                ?>  
                                <div class="row no-gutters my-2" id="noRegistroHT"> 
                                    <p>Aun no hay hábitos fisiologicos registrados</p>
                                </div>
                                <?php                                 
                                    }                                
                                ?> 
                                <br><hr>
                               

                            </div>

                            <!--========================= ENFERMEDADES DE LA INFANCIA  ===========================================================-->
                            <div id="enfermedadesInfancia" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <!--Titulo de seccion -->
                                        <h5 class="titulo-seccion  text-uppercase">
                                            <span class="seccion-clinica pr-2">Enfermedades de la infancia</span>                                             
                                        </h5>
                                    </div>
                                </div> 
                                <!--Fila -->
                                <form method="POST" action="<?php echo constant('URL');?>editarHistoria/insertarHabito">
                                <div class="row no-gutters my-2">
                                    <div class="col-2 px-1">
                                        <label for="HT_nTipo">Tipo</label>
                                        <input type="text" class="form-control" name="nombreEI">
                                    </div>
                                    <div class="col-6 px-1">
                                        <label for="HT_nObs">Observación</label>
                                        <input type="text" class="form-control" name="detalleEI">                                       
                                    </div>     
                                    <div class="col-2">                                          
                                        <button type="submit"  class="btn-action agregar" name="nuevoEI" value="EI">                                         
                                            <i class="fas fa-plus-circle"></i>
                                            Agregar
                                        </button> 
                                        <button type="button"  class="btn-action aceptar">                                         
                                            <i class="fas fa-check-square"></i>
                                            Aceptar
                                        </button> 
                                    </div>                                  
                                </div> 
                               <form>
                                <br>
                                <?php
                                    if(isset($this->historialClinico) && count($this->historialClinico->enfermedadesInfancia) > 0){
                                        foreach($this->historialClinico->enfermedadesInfancia as $enfermedadI){
                                ?>
                                <div class="row no-gutters my-2">
                                <div class="col-3">
                                        <input type="text" class="form-control text-uppercase text-center" value="<?php echo $enfermedadI['nombre']?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control text-uppercase text-center" value="<?php echo $enfermedadI['detalle']?>" disabled>
                                    </div> 
                                    <button type="button"  class="btnCirculo editar"> 
                                        <i class="fas fa-edit"></i>
                                    </button>  
                                    <button type="button" class="btnCirculo eliminar"> 
                                        <i class="fas fa-trash-alt"></i>
                                    </button> 
                                </div>
                                
                                <?php       
                                        }
                                    } 
                                ?>   
                                <br><hr>
                               

                            </div>
                        
                             
                        <!-- fin de columna --> 
                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                        </div>                     
                                           
                        <!-- fin de if --> 
                        <?php                                 
                            }                                
                        ?>
                    </div> 


            </div>
        </div> 
    </body>
    <script>
        $(document).ready(function(){
            $('#bExp').addClass('active');
            $('#gExp').removeClass('active');
        });
    </script>
</html>