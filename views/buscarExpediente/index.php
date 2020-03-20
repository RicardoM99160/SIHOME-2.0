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
                <div id="tituloPagina" class="text-uppercase">
                    <h2 class="">Buscador de Expedientes</h2>
                </div>

                <!-- Form para realizar búsqueda -->
                <form id="buscador" class="w-100 d-flex">
                    <div class="form-group w-50 px-2 d-flex">
                        <input type="text" name="filtro" id="inputFiltro" class="form-control" placeholder="Ingrese el # del expediente">
                    </div>
                    <div class="form-group d-inline-flex ml-auto">
                        <button id="btnFiltro" name="aplicarFiltro" class="btn btn-light">
                            <svg id="i-options" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M28 6 L4 6 M28 16 L4 16 M28 26 L4 26 M24 3 L24 9 M8 13 L8 19 M20 23 L20 29" />
                            </svg>
                            <span>Refinar búsqueda</span>
                        </button>
                    </div>
                </form>

                <!-- Mostrar expedientes -->
                <div id="expedientes" class="bg-success w-100 h-75 border border-dark rounded">
                    <h5 id="tituloResultados" class="bg-secondary px-2 py-1">Resultados</h5>
                    <div id="resultadosExpedientes" class="bg-success w-100 overflow-auto">
                        <ul class="list-group w-100 h-75 px-3">
                            <li class="list-group-item my-2 tarjeta-expediente">
                                <a href="" class="w-100 d-flex flex-row justify-content-around">
                                    <div id="imagenUsuario" class="w-25 h-100 pl-3 d-flex">
                                        <img src="public/img/user.png" alt="Imagen de usuario" class="img-usuario">
                                    </div>
                                    <div id="datosUsuario" class="d-flex w-50">
                                        <p>Expediente: Id_Expediente<br>
                                            Nombre: Nombre_Paciente<br>
                                            DUI: Dui_Paciente<br>
                                            Fecha de creacion: Fecha_Creacion<br>
                                            Ultima Cita: Fecha_Modificacion
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item my-2 tarjeta-expediente">
                                <a href="" class="w-100 d-flex flex-row justify-content-around">
                                    <div id="imagenUsuario" class="w-25 h-100 pl-3 d-flex">
                                        <img src="public/img/user.png" alt="Imagen de usuario" class="img-usuario">
                                    </div>
                                    <div id="datosUsuario" class="d-flex w-50">
                                        <p>Expediente: Id_Expediente<br>
                                            Nombre: Nombre_Paciente<br>
                                            DUI: Dui_Paciente<br>
                                            Fecha de creacion: Fecha_Creacion<br>
                                            Ultima Cita: Fecha_Modificacion
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item my-2 tarjeta-expediente">
                                <a href="" class="w-100 d-flex flex-row justify-content-around">
                                    <div id="imagenUsuario" class="w-25 h-100 pl-3 d-flex">
                                        <img src="public/img/user.png" alt="Imagen de usuario" class="img-usuario">
                                    </div>
                                    <div id="datosUsuario" class="d-flex w-50">
                                        <p>Expediente: Id_Expediente<br>
                                            Nombre: Nombre_Paciente<br>
                                            DUI: Dui_Paciente<br>
                                            Fecha de creacion: Fecha_Creacion<br>
                                            Ultima Cita: Fecha_Modificacion
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item my-2 tarjeta-expediente">
                                <a href="" class="w-100 d-flex flex-row justify-content-around">
                                    <div id="imagenUsuario" class="w-25 h-100 pl-3 d-flex">
                                        <img src="public/img/user.png" alt="Imagen de usuario" class="img-usuario">
                                    </div>
                                    <div id="datosUsuario" class="d-flex w-50">
                                        <p>Expediente: Id_Expediente<br>
                                            Nombre: Nombre_Paciente<br>
                                            DUI: Dui_Paciente<br>
                                            Fecha de creacion: Fecha_Creacion<br>
                                            Ultima Cita: Fecha_Modificacion
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>   
        </div>
    </body>
</html>