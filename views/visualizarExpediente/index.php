<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Visualizar Expediente</title>
        
        <!-- CSS propio -->
        <link rel="stylesheet" href="public/css/visualizarExpediente.css">

    </head>
    <body>
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?>

            <div id="contenido">
                <div id="infoGeneralExpediente" class="border border-dark informacion-expediente">
                    <div class="row px-3 py-3 no-gutters">
                        <div class="col-9">
                            <div class="row my-2">
                                <div class="col">
                                    <h4>Expediente No 100000</h4>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <p>Nombre completo, apellido completo</p>
                                </div>
                            </div>
                            <div class="row form-group no-gutters">
                                <div class="col-3 px-1">
                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="12 mayo 2016 (30 años)" class="form-control" disabled>
                                </div>
                                <div class="col-2 px-1">
                                    <label for="sexo">Sexo</label>
                                    <input type="text" name="sexo" id="sexo" value="Masculino" class="form-control" disabled>
                                </div>
                                <div class="col-3 px-1">
                                    <label for="dui">DUI</label>
                                    <input type="text" name="dui" id="dui" value="00000000-0" class="form-control" disabled>
                                </div>
                                <div class="col-2 px-1">
                                    <label for="tipoSangre">Tipo de sangre</label>
                                    <input type="text" name="tipoSangre" id="tipoSangre" value="O+" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row form-group no-gutters">
                                <div class="col-7 px-1">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" value="Col El Trafico 1, Calle Venecia, Casa 3A-1, San Vicente" class="form-control" disabled>
                                </div>
                                <div class="col-3 px-1">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" value="0000-0000" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <img src="public/img/user.png" alt="Imagen Expediente" class="img-fluid">
                        </div>
                    </div>
                    <div class="row no-gutters mb-3">
                        <div class="col d-flex justify-content-center">
                            <p class="px-1"><b>Ultima consulta:</b></p>
                            <p class="px-1">Recibida el <u>15 de Mayo de 2019</u> en <u>Instituto Médico San Marcos</u></p>
                            <button class="btn py-0 px-1 h-25">
                                <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="historialExpediente" class="border border-top-0 border-dark informacion-expediente" >
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button id="colapsarBarraExpediente" class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#contenidoBarraExpediente" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="contenidoBarraExpediente" class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a id="hConsulta" href="#" class="nav-link">Histórico de Consultas</a>
                                </li>
                                <li class="nav-item">
                                    <a id="hClinico" href="#" class="nav-link">Historial Clínico</a>
                                </li>
                                <li class="nav-item">
                                    <a id="hCirugia" href="#" class="nav-link">Cirugias</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <!--Historial de consultas-->
                    <div id="historialConsulta" class="px-3">
                        <h5 class="mt-3 mb-4">
                            <svg id="i-folder" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="27" height="27" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                            </svg>
                            <span><b>Consultas Registradas(16)</b></span>
                        </h5>
                        <form action="" class="row form-group">
                            <div class="col-6">
                                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Introduzca un parametro de búsqueda">
                            </div>
                            <div class="col-3">
                                <button id="btnFiltro" name="aplicarFiltro" class="btn btn-light">
                                    <svg id="i-options" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M28 6 L4 6 M28 16 L4 16 M28 26 L4 26 M24 3 L24 9 M8 13 L8 19 M20 23 L20 29" />
                                    </svg>
                                    <span>Refinar búsqueda</span>
                                </button>
                            </div>
                            <div class="col-2 ml-auto">
                                <button id="btnConsulta" name="nuevaConsulta" class="btn btn-light">
                                    <svg id="i-compose" class="mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                    </svg>
                                    <span>Nueva consulta</span>
                                </button>
                            </div>
                        </form>
                        <div class="d-flex mt-4 align-items-center">
                            <p class="m-0"><b>Mostrando 1-10 / de 16</b></p>
                            <button id="menosResultados" class="btn" name="menosR">
                                <svg id="i-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="black" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M22 30 L6 16 22 2 Z" />
                                </svg>
                            </button>
                            <button id="masResultados" class="btn" name="masR">
                                <svg id="i-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="black" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M10 30 L26 16 10 2 Z" />
                                </svg>
                            </button>
                        </div>
                        <table class="table border border-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Código de consulta</th>
                                    <th scope="col">Doctor encargado</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>Febril</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!--Historial de clinico-->
                    <div id="historialClinico" class="row px-3 py-3">
                        <div class="col">
                            <div id="habitosToxicos" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Habitos Toxicos</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="alcoholH" id="alcoholHabito" class="form-control text-uppercase text-center" value="Alcohol" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="alcoholV" id="alcoholValor" class="form-control" value="Solo en celebraciones" disabled>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="tabacoH" id="tabacoHabito" class="form-control text-uppercase text-center" value="Tabaco" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="tabacoV" id="tabacoValor" class="form-control" value="1 o dos veces por semana" disabled>
                                    </div>
                                </div>
                            </div>

                            <div id="habitosFisiologicos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Habitos Fisiologicos</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="alimentacionH" id="alimentacionHabito" class="form-control text-uppercase text-center" value="Alimentacion" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="alimentacionV" id="alimentacionValor" class="form-control" value="3 veces al día, sin refrigerios" disabled>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="diuresisH" id="diuresisHabito" class="form-control text-uppercase text-center" value="Dihuresis" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="diuresisV" id="diuresisValor" class="form-control" value="Normal, poco oscura, no despierta por la noche para orinar" disabled>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="catarsisH" id="catarsisHabito" class="form-control text-uppercase text-center" value="Dihuresis" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="catarsisV" id="catarsisValor" class="form-control" value="Normal" disabled>
                                    </div>
                                </div>
                            </div>

                            <div id="enfermedadesInfancia" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Enfermedades de la infancia</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="enfermedad1I" id="enfermedad1Infancia" class="form-control text-uppercase text-center h-100" value="Varicela" disabled>
                                    </div>
                                    <div class="col-7">
                                        <div id="enfermedad1IDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">Diagnosticado a los 10 años</p>
                                            <p>Informacion del paciente</p>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="enfermedades" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Enfermedades</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="enfermedad1" id="enfermedad1" class="form-control text-uppercase text-center h-100" value="CV" disabled>
                                    </div>
                                    <div class="col-7">
                                        <div id="enfermedad1Descripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">Diagnosticado a los 28 años</p>
                                            <p>Tratado con Elapril 10 mg/dia sin dieta dash, realiza acompañamiento cardiólogo periódicamente</p>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="alergias" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Alergias</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <div id="alergiasLista" class="px-3 py-3 form-control font-weight-bold campo-descriptivo">
                                            <p>Caspa de mascotas</p>
                                            <p>Penicilina y antibióticos basados en penicilina</p>
                                            <p>Latex</p>
                                            <p>Moho</p>                              
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div id="antecedentes" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Antecedentes Heredofamiliares</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="antecedente1" id="antecedente1" class="form-control text-uppercase text-center h-100" value="Hipertension" disabled>
                                    </div>
                                    <div class="col-7">
                                        <div id="antecedente1Descripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">Madre y abuela</p>
                                            <p>El paciente afirma que su madre y abuela materna fueron diagnosticadas con hipertensión</p>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="medicamentos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-uppercase font-weight-bold">
                                            <span class="pr-2">Medicamentos</span>
                                            <button class="btn btn-light">
                                                <svg id="i-compose" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                                </svg>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row no-gutters my-2">
                                    <div class="col-9">
                                        <div id="medicamentosDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                                            <p class="font-weight-bold">ATENOL (50 Mg)</p>
                                            <p>1 tableta cada mañana</p>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Historial de cirugias-->
                    <div id="historialCirugia" class="px-3">
                        <h5 class="mt-3 mb-4">
                            <svg id="i-folder" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="27" height="27" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                            </svg>
                            <span><b>Cirugias Registradas(3)</b></span>
                        </h5>
                        <form action="" class="row form-group">
                            <div class="col-6">
                                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Introduzca un parametro de búsqueda">
                            </div>
                            <div class="col-3">
                                <button id="btnFiltro" name="aplicarFiltro" class="btn btn-light">
                                    <svg id="i-options" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M28 6 L4 6 M28 16 L4 16 M28 26 L4 26 M24 3 L24 9 M8 13 L8 19 M20 23 L20 29" />
                                    </svg>
                                    <span>Refinar búsqueda</span>
                                </button>
                            </div>
                            <div class="col-2 ml-auto">
                                <button id="btnCirugia" name="registrarCirugia" class="btn btn-light">
                                    <svg id="i-compose" class="mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                                    </svg>
                                    <span>Registrar cirugia</span>
                                </button>
                            </div>
                        </form>
                        <div class="d-flex mt-4 align-items-center">
                            <p class="m-0"><b>Mostrando 1-10 / de 3</b></p>
                            <button id="menosResultados" class="btn" name="menosR">
                                <svg id="i-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="black" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M22 30 L6 16 22 2 Z" />
                                </svg>
                            </button>
                            <button id="masResultados" class="btn" name="masR">
                                <svg id="i-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="black" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M10 30 L26 16 10 2 Z" />
                                </svg>
                            </button>
                        </div>
                        <table class="table border border-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Cirujano</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora de inicio</th>
                                    <th scope="col">Duración</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Apendicitis</td>
                                    <td>Julio Salazar</td>
                                    <td>15 Marzo 2016</td>
                                    <td>12:00:00</td>
                                    <td>2:43:00</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>No. 000000</td>
                                    <td>Julio Salazar</td>
                                    <td>6 abril 2016</td>
                                    <td>12:00:00</td>
                                    <td>5:00:00</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>No. 000000</td>
                                    <td>Luisa Valiente</td>
                                    <td>22 Junio 2016</td>
                                    <td>12:00:00</td>
                                    <td>2:43:00</td>
                                    <td>
                                        <button class="btn h-25">
                                            <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#hConsulta').on('click', function () {
                    $('#historialConsulta').show();
                    $('#historialClinico').hide();
                    $('#historialCirugia').hide();
                });

                $('#hClinico').on('click', function () {
                    $('#historialConsulta').hide();
                    $('#historialClinico').show();
                    $('#historialCirugia').hide();
                });

                $('#hCirugia').on('click', function () {
                    $('#historialConsulta').hide();
                    $('#historialClinico').hide();
                    $('#historialCirugia').show();
                });
            });
        </script>

    </body>
</html>