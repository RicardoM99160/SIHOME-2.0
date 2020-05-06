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
        <?php require 'views/modo.php'?>

        <div class="wrapper">

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina" class="w-100 d-flex mb-4">
                    <h4>
                        <svg id="i-user1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                        </svg>
                        <?php
                            if(isset($this->usuarios) && count($this->usuarios) > 0){
                                echo "<span>Usuarios (". count($this->usuarios) .")</span>";
                            }else{
                                echo "<span>Usuarios (0)</span>";
                            }
                        ?>
                        
                    </h4>

                    <div class="d-inline-flex ml-auto">
                        <a href="<?php echo constant('URL')?>admin/crearUsuario" class="btn btn-dark">
                            <svg id="i-compose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                            </svg>
                            <span>Crear usuario</span>
                        </a>
                    </div>
                    
                </div>

                <!-- Ventana modal para Nueva contraseña -->
                <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="modalPassLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar Contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frm-contraseña" action="#" method="POST"> 
                                    <div class="modal-body"> 
                                        <div class="form-group w-100">
                                            <label for="nuevoPassword">Ingrese la nueva contraseña:</label>
                                            <input type="text" name="passwordN" id="nuevoPassword" class="form-control" onChange="validarContraseña('guardarP')">
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="confirmarPassword">Confirme la nueva contraseña:</label>
                                            <input type="text" name="passwordC" id="confirmarPassword" class="form-control" onChange="validarContraseña('guardarP')">
                                            <div class="invalid-feedback">Las contraseñas deben coincidir.</div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="guardar" id="guardarP" class="btn btn-primary" disabled>Guardar nueva contraseña</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Ventana modal para Deshabilitar usuario -->
                <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Deshabilitar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frm-usuario" action="#" method="POST"> 
                                    <div class="modal-body"> 
                                        <div class="form-group w-100">
                                            <label for="deshabilitarUsuario">¿Está seguro que desea Deshabilitar al usuario Julio Salazar?</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="usuarioD" class="btn btn-primary">Deshabilitar usuario</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de usuarios-->
                <div id="cont-table">
                <table class="table table-borderless borderless">
                    <thead class="thead">
                    <!-- Encabezados de tabla-->
                      <tr>
                        <th scope="col"> #</th>
                        <th scope="col">Código</th>
                        <th style="width: 20%;" scope="col">Nombre completo</th>
                        <th sscope="col">Correo electrónico</th>
                        <th scope="col">Habilitar/Deshabilitar</th>
                        <th scope="col">Cambiar contraseña</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once 'models/usuario.php';
                            if(isset($this->usuarios) && count($this->usuarios)){
                                $i = 1;
                                foreach($this->usuarios as $row){
                                    $usuario = new Usuario();
                                    $usuario = $row;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $usuario->codigo; ?></td>
                            <td><?php echo $usuario->nombre; ?></td>
                            <td><?php echo $usuario->email; ?></td>
                            <td style="text-align: center;"><input type="checkbox" name="habilitarU" class="form-check-input habilitarUsuario" data-codigo="<?php echo $usuario->codigo; ?>" <?php if($usuario->habilitado == 1){ echo "checked"; }?> <?php if($usuario->cargo == 0){ echo "disabled"; }?>></td>
                            <td style="text-align: center;"><button type="button" class="btn btn-default cPass" name="nuevo-pass" data-toggle="modal" data-target="#modalPass" data-codigo="<?php echo $usuario->codigo; ?>"><i class="fas fa-external-link-alt"></i></button></td>
                            <!--<td class="d-inline-flex" id="<?php echo $usuario->codigo;?>">
                                <button type="button" class="btn btn-dark mx-2" name="deshabilitar-usuario" data-toggle="modal" data-target="#modalUsuario">3</button>
                            </td>-->
                        </tr>
                        <?php
                                $i++;
                                }
                            }else{
                        ?>
                        <tr>
                            <td colspan="5">No hay usuarios registrados<td>
                        </tr>
                        <?php                                
                            }
                        ?>
                    </tbody>
                  </table>
                </div>  
            </div>
        </div>
        <script type="text/javascript">

        function validarContraseña(id_boton)
        {
            var contra1 = document.getElementById("nuevoPassword");
            var contra2 = document.getElementById("confirmarPassword");
            //Alerta
            if((contra1.value != contra2.value) && (contra1.value != "") && (contra2.value != "")) contra2.classList.add('is-invalid');
            else contra2.classList.remove('is-invalid');

            //Botón
            if((contra1.value != contra2.value)) document.getElementById(id_boton).disabled = true;
            else if ((contra1.value != "") && (contra2.value != "")) document.getElementById(id_boton).disabled = false;
        }

        $(document).ready(function() {
            //Función para guardar nueva contraseña
            $("#passwordN").click(function() {
                $("#frm-contraseña").submit();
            });
            //Función para deshabilitar usuario
            $("#usuarioD").click(function() {
                $("#frm-usuario").submit();
            });            
        });
        </script>
        <script src="<?php echo constant('URL');?>public/js/main.js"></script>
    </body>
</html>