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
                    
                    <?php
                    if(isset($_POST['crear']) && $_POST['crear'] == "Crear usuario"){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?php echo $this->mensaje; ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="d-inline-flex ml-auto">
                        <a href="<?php echo constant('URL')?>" class="btn btn-dark">
                            <svg id="i-compose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                            </svg>
                            <span>Administrar usuarios</span>
                        </a>
                    </div>
                </div>

                <form action="<?php echo constant('URL')?>admin/crearUsuario/1" method="POST" class="w-50 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Código</label>
                                <?php
                                    if(isset($_SESSION['cantidadUsuarios']) && $_SESSION['cantidadUsuarios'] > 0){
                                ?>
                                <input type="text" name="codigo" id="codigoUsuario" class="form-control" value="<?php echo $this->nuevoid; ?>" readonly>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Correo institucional</label>
                                <input type="text" name="correo" id="correoUsuario" class="form-control" required tabindex="4"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombre" id="nombreUsuario" class="form-control" required tabindex="1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="pass" id="passUsuario" class="form-control" required tabindex="5">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellido" id="apellidoUsuario" class="form-control" required tabindex="2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Cargo</label>
                                <select class="form-control" tabindex="6" name="cargo">
                                    <option value="0">Administrador</option>
                                    <option value="1">Doctor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;" class="d-flex justify-content-center">
                        <input type="submit" name="crear" id="crearU" value="Crear usuario" class="btn btn-primary">
                    </div>
                </form> 
            </div>
        </div>

        <script src="<?php echo constant('URL');?>public/js/main.js"></script>
    </body>
</html>