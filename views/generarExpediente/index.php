<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Generar Expediente</title>

        <!-- CSS propio -->
        <link rel="stylesheet" href="public/css/generarExpediente.css">

    </head>
    <body>
        <?php require 'views/plantillaBase.php'; ?>
        <div class="wrapper">

            <?php require 'views/barraLateral.php'; ?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="tituloPagina" class="text-uppercase">
                    <h2 class="">Generar Expediente</h2>
                </div>

                <form action="">
                    <!-- Información personal -->
                    <div id="infoPersonal" class="w-100 h-75 my-3 border border-dark rounded">
                        <h6 id="tituloInfoPersonal" class="bg-secondary px-2 py-1">Información personal</h6>
                        <div id="camposInfoPersonal" class="campos-informacion bg-light w-100 overflow-auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 form-group d-flex">
                                        <label for="numExpediente" class="w-50">Expediente No</label>
                                        <input type="text" name="nexpediente" id="numExpediente" class="w-50 form-control" placeholder="100000000000" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group d-flex">
                                        <label for="txtNombre" class="w-50">Nombre</label>
                                        <input type="text" name="nombre" id="txtNombre" class="w-50 form-control" required>
                                    </div>
                                    <div class="col form-group d-flex">
                                        <label for="fechaNacimiento" class="w-50">Fecha de nacimiento</label>
                                        <input type="date" name="nacimiento" id="fechaNacimiento" class="w-50 form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group d-flex">
                                        <label for="txtApellido" class="w-50">Apellidos</label>
                                        <input type="text" name="apellido" id="txtApellido" class="w-50 form-control" required>
                                    </div>
                                    <div class="col form-group d-flex">
                                        <label for="selectSexo" class="w-50">Sexo</label>
                                        <select name="sexo" id="selectSexo" class="w-50 custom-select">
                                            <option selected>Select</option>
                                            <option value="m">Masculino</option>
                                            <option value="f">Femenino</option>
                                            <option value="o">Otro</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col form-group d-flex">
                                        <label for="txtDUI" class="w-50">DUI</label>
                                        <input type="text" name="dui" id="txtDUI" class="w-50 form-control" required>
                                    </div>
                                    <div class="col form-group d-flex">
                                        <label for="selectSangre" class="w-50">Tipo de sangre</label>
                                        <select name="sangre" id="selectSangre" class="w-50 custom-select">
                                            <option selected>Select</option>
                                            <option value="a+">A+</option>
                                            <option value="a-">A-</option>
                                            <option value="b+">B+</option>
                                            <option value="b-">B-</option>
                                            <option value="ab+">AB+</option>
                                            <option value="ab-">AB-</option>
                                            <option value="o+">O+</option>
                                            <option value="o-">O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Información de contacto -->
                    <div id="infoContacto" class="w-100 h-75 my-3 border border-dark rounded">
                        <h6 id="tituloInfoContacto" class="bg-secondary px-2 py-1">Información de contacto</h6>
                        <div id="camposInfoContacto" class="campos-informacion bg-light w-100 overflow-auto">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="form-group d-flex align-items-center">
                                            <label for="areaDireccion" class="w-50">Dirección</label>
                                            <textarea name="direccion" id="areaDireccion" cols="30" rows="4" class="w-50 form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row no-gutters form-group d-flex">
                                            <label for="codigoPostal" class="w-50">Codigo Postal</label>
                                            <input type="number" name="codigop" id="codigoPostal" class="w-50 form-control">
                                        </div>
                                        <div class="row no-gutters form-group d-flex">
                                            <label for="numeroTelefono" class="w-50">Teléfono</label>
                                            <input type="text" name="telefono" id="numeroTelefono" class="w-50 form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de pariente más cercano -->
                    <div id="infoContacto" class="w-100 h-75 my-3 border border-dark rounded">
                        <h6 id="tituloInfoContacto" class="bg-secondary px-2 py-1">Información de pariente más cercano</h6>
                        <div id="camposInfoContacto" class="campos-informacion bg-light w-100 overflow-auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col form-group d-flex">
                                        <label for="txtNombrePariente" class="w-50">Nombre</label>
                                        <input type="text" name="nombrep" id="txtNombrePariente" class="w-50 form-control">
                                    </div>
                                    <div class="col form-group d-flex">
                                        <label for="txtTelefonoPariente" class="w-50">Teléfono</label>
                                        <input type="text" name="telefonop" id="txtTelefonoPariente" class="w-50 form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row no-gutters form-group d-flex">
                                            <label for="txtApellidoPariente" class="w-50">Apellidos</label>
                                            <input type="text" name="apellidop" id="txtApellidoPariente" class="w-50 form-control">
                                        </div>
                                        <div class="row no-gutters form-group d-flex">
                                            <label for="selectParentezco" class="w-50">Parentezco</label>
                                            <select name="parentezcop" id="selectParentezco" class="w-50 custom-select">
                                                <option selected>Select</option>
                                                <option value="p">Padre</option>
                                                <option value="m">Madre</option>
                                                <option value="o">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group d-flex">
                                            <label for="areaDireccionPariente" class="w-50">Dirección</label>
                                            <textarea name="direccionp" id="areaDireccionPariente" cols="30" rows="4" class="w-50 form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 form-group d-flex justify-content-end">
                        <button type="submit" name="submit" id="enviar" value="Guardar" class="btn btn-dark">
                            <svg id="i-folder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                            </svg>
                            <span>Guardar</span>
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>