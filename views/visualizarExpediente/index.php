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
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?> 
            <div id="contenido">
                <!--Informacion general de paciente -->
                <div id="ruta">
                    <h6><a href="">Buscar expediente</a> > <span>EXPEDIENTE P000000</span></h6>
                </div>
                
                <div id="cont-infoGeneral" class="informacion-expediente">
              
                    <div class="row px-3 py-3 no-gutters">
                        <div class="col-9"> 
                            <div class="row my-2">
                                <!-- Nombre completo -->
                                <div class="col"> 
                                    <h3 id="font-nombreCompleto">Dieguito Armando, Maradona</h43>
                                </div> 
                            </a> 
                            </div>
                            <hr>
                            <!-- Fila 1 --> 
                            <div class="row form-group no-gutters">
                                <!--Fecha de nacimiento -->
                                <div class="col-3 px-1">
                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="12 mayo 1990 (30 años)" class="form-control" disabled>
                                </div>
                                <!-- Sexo -->
                                <div class="col-2 px-1">
                                    <label for="sexo">Sexo</label>
                                    <input type="text" name="sexo" id="sexo" value="Masculino" class="form-control" disabled>
                                </div>
                                <!--DUI-->
                                <div class="col-3 px-1">
                                    <label for="dui">DUI</label>
                                    <input type="text" name="dui" id="dui" value="00000000-0" class="form-control" disabled>
                                </div>
                                <!--Tipo de sangre -->
                                <div class="col-2 px-1">
                                    <label for="tipoSangre">Tipo de sangre</label>
                                    <input type="text" name="tipoSangre" id="tipoSangre" value="O+" class="form-control" disabled>
                                </div>
                            </div>
                            <!-- Fila 2 --> 
                            <div class="row form-group no-gutters">
                                <!--Direccion -->
                                <div class="col-7 px-1">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" value="Col El Trafico 1, Calle Venecia, Casa 3A-1, San Vicente" class="form-control" disabled>
                                </div>
                                <!--Telefono-->
                                <div class="col-3 px-1">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" value="0000-0000" class="form-control" disabled>
                                </div>
                            </div>
                        </div> 
                         
                    </div>
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
                        <li class="nav-item">
                            <a class="nav-link" id="cirugia-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cirugias</a>
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
                                    <span>Consultas Registradas  (16)</span>
                                </h5>
                                <!--Formulario de opciones -->
                                <form action="" class="row form-group inline-form">
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
                                        <button id="btn-nuevaConsulta" name="aplicarFiltro">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span> Nueva consulta </span>
                                        </button>
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
                                                <td scope="row">1</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td scope="row">2</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td scope="row">3</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td scope="row">4</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td scope="row">5</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td scope="row">6</td>
                                                <td>000000</td>
                                                <td>Nombre del doctor</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora</td>
                                                <td>comentario</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <!--Historial de clinico-->
                    <div id="historialClinico" class="row px-3 py-3">
                        <div class="col">
                            <div id="habitosToxicos" class="form-group mt-2">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Habitos Toxicos</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                            <hr>
                            <div id="habitosFisiologicos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Habitos Fisiologicos</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                            <hr>
                            <div id="enfermedadesInfancia" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades de la infancia</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                            <hr>
                            <div id="enfermedades" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Enfermedades</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                            <hr>
                            <div id="alergias" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Alergías</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                            <hr>
                            <div id="antecedentes" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Antecedentes heredofamiliares</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                                            <p>El paciente afirma que su madre y abuela materna fueron diagnosticadas con hipertensión</p>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div id="medicamentos" class="form-group mt-5">
                                <div class="row">
                                    <div class="col">
                                    <h6 class="titulo-seccion  text-uppercase">
                                            <span class="pr-2">Medicamentos</span>
                                            <button class="btn btn-light">
                                                <i class="fas fa-edit"></i>
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
                    <div id="historialConsulta" class="px-3">
                                <h5 class="titulo-seccion mt-3 mb-4">
                                    <svg id="i-folder" class="pb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="27" height="27" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                                    </svg>
                                    <!--Número de cirugias --->
                                    <span>Cirugias Registradas  (3)</span>
                                </h5>
                                <!--Formulario de opciones -->
                                <form action="" class="row form-group inline-form">
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
                                    <!--Boton nueva cirugia -->   
                                    <div class="form-group">
                                        <button id="btn-nuevaConsulta" name="aplicarFiltro">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span> Nueva cirugia </span>
                                        </button>
                                    </div> 
                                </form>
                                <!--Tabla de cirugias-->
                                <div id="cont-table">
                                    <table class="table table borderless align-midle table-hover" >
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Código de cirugia</th>
                                                <th scope="col">Motivo</th>
                                                <th scope="col">Cirujano</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Hora de inicio</th>
                                                <th scope="col">Duración</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td>000000</td>
                                                <td>Descripcion de motivo</td>
                                                <td>Nombre de cirujano</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora inicio</td> 
                                                <td>duracion (horas)</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr>  
                                            <tr>
                                                <td scope="row">2</td>
                                                <td>000000</td>
                                                <td>Descripcion de motivo</td>
                                                <td>Nombre de cirujano</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora inicio</td> 
                                                <td>duracion (horas)</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr>  
                                            <tr>
                                                <td scope="row">3</td>
                                                <td>000000</td>
                                                <td>Descripcion de motivo</td>
                                                <td>Nombre de cirujano</td>
                                                <td>dia-mes-anio</td>
                                                <td>hora inicio</td> 
                                                <td>duracion (horas)</td> 
                                                <td>
                                                    <a class="btn btn-default" href="">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a> 
                                                </td> 
                                            </tr>  
                                        </tbody>
                                    </table>
                                </div> 
                    </div>

                </div>
            </div>
        </div>

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
</html>