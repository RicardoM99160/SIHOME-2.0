<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php $_SESSION['idPaciente']='';?>
        
        <title>Administrar Usuarios</title>
        <!-- CSS slider -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/bootstrap-slider.css">
        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/admin.css">
    </head>
    <body>
        <!-- Validaciones -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/validaciones.js"></script>
        <?php require 'views/plantillaBase.php'?>

        <div class="wrapper">

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina" class="w-100 d-flex mb-4">
                    <h4>
                        <svg id="i-user1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                        </svg>
                        <span>Crear usuario</span>
                    </h4>
                    <div class="d-inline-flex ml-auto">
                        <!--Boton administrar usuarios -->   
                        <a class="btn-admin" href="<?php echo constant('URL')?>">
                            <i class="fas fa-file-alt"></i>
                            <span>Administrar usuarios</span>
                        </a> 
                    </div>
                </div>

                <form action="<?php echo constant('URL')?>admin/crearUsuario/1" method="POST" class="w-50 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Código</label>
                                <input type="text" name="codigo" id="codigoUsuario" class="form-control" value="<?php echo ($this->usuario != "") ? $this->usuario->codigo : "Sin datos" ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Correo institucional</label>
                                <input type="text" name="correo" id="correoUsuario" class="form-control" value="<?php echo ($this->usuario != "") ? $this->usuario->email : "Sin datos" ?>" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombre" id="nombreUsuario" class="form-control" value="<?php echo ($this->usuario != "") ? $this->usuario->nombre : "Sin datos" ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="pass" id="passUsuario" class="form-control" value="<?php echo ($this->usuario != "") ? $this->usuario->pass : "Sin datos" ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellido" id="apellidoUsuario" class="form-control" value="<?php echo ($this->usuario != "") ? $this->usuario->apellido : "Sin datos" ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Cargo</label>
                                <select class="form-control" tabindex="6" name="cargo" readonly>
                                    <option value="0">
                                        <?php 
                                            if($this->usuario != ""){
                                                if($this->usuario->cargo == 1){ 
                                                    echo "Doctor";
                                                }else{ 
                                                    echo "Administrador";
                                                }
                                            }else{
                                                echo "Sin datos";
                                            } 
                                            ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <script src="<?php echo constant('URL');?>public/js/main.js"></script>
    </body>
</html>