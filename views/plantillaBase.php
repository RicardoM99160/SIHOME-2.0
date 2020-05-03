<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/plantillaBase.css">

        <!-- Font Awesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    </head>
    <body onload="checkModoOscuro()">
        
        <!-- Barra superior de navegación -->
        <div id="contenedorBarraSuperior">
            <nav id="barraSuperior" class="navbar navbar-expand-lg navbar-light pb-2 pt-1">
                <!-- Boton para desplegar barra lateral de navegación-->
                <a href="#" id="colapsarBarraLateral" class="navbar-brand nav-link dropdown-toggle mr-5" role="button" aria-haspopup="true" aria-expanded="false">  
                    <i class="fas fa-image"></i>
                    <span id="font-logo">SIHOME</span>
                </a>
                <!-- Boton para desplegar la barra superior -->
                
                <!--<button id="colapsarBarraSuperior" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenidoBarraSuperior" aria-controls="contenidoBarraSuperior" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>-->
                <!--Este seria un dropdown también (Sigue pendiente)-->
                <div id="contenedorCuentaUsuario" class="nav-item dropdown my-1 ml-auto">
                    <a id="cuentaUsuario" href="#" class="nav-link dropdown-toggle py-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="fas fa-user-circle fa-lg"></i>
                        <span><?php echo $_SESSION['apellido'];?>, <?php echo $_SESSION['nombre'];?></span>     
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cuentaUsuario">
                        <a class="dropdown-item" href="<?php if($_SESSION['cargo'] == 0){echo constant('URL') . "admin/cerrarSesion";}else{ echo constant('URL') . "buscarExpediente/cerrarSesion";}?>">
                            <svg id="i-signout" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                        <span>Cerrar sesión</span>
                        </a>
                    </div>
                </div>
                <div style="text-align: center;">
                    <button class="switch" id="switch" onclick="modoOscuro()">
                        <span><i class="fas fa-sun"></i></span>
                        <span><i class="fas fa-moon"></i></span>
                    </button>
                </div>
            </nav>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Script para mostar/ocultar barra de navegación lateral-->
        <script>
            $(document).ready(function () {

                $('#colapsarBarraLateral').on('click', function () {
                    $('#barraLateral').toggleClass('active');
                });

            });
        </script>
    </body>
</html>