<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- CSS propio -->
        <link rel="stylesheet" href="public/css/plantillaBase.css">

        <!-- Font Awesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <!-- Barra superior de navegación -->
        <div id="contenedorBarraSuperior">
            <nav id="barraSuperior" class="navbar navbar-expand-lg navbar-light bg-warning pb-2 pt-1">
                <!-- Boton para desplegar barra lateral de navegación-->
                <a href="#" id="colapsarBarraLateral" class="navbar-brand nav-link dropdown-toggle mr-5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SIHOME</a>
                <!-- Boton para desplegar la barra superior -->
                <button id="colapsarBarraSuperior" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#contenidoBarraSuperior" aria-controls="contenidoBarraSuperior" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="contenidoBarraSuperior" class="collapse navbar-collapse">
                    <!--Este seria un dropdown también (Sigue pendiente)-->
                    <div id="contenedorCuentaUsuario" class="nav-item active my-1 ml-auto">
                        <a id="cuentaUsuario" href="#" class="nav-link py-1" role="button">
                            <svg id="i-ellipsis-vertical" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <circle cx="16" cy="7" r="2" />
                                <circle cx="16" cy="16" r="2" />
                                <circle cx="16" cy="25" r="2" />
                            </svg>
                            <span>Apellido, Nombre</span>
                            <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                            </svg>
                        </a>
                    </div>
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