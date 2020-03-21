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
                <div id="font-tituloPagina">
                    
                    <h4>  Generar un expediente</h4>
                </div>

                <!--- Formulario generar expediente-->
                <form id="form-generarExpediente" action="">
                    <!--- Seccion informacion personal-->
                    <div class="card">
                        <h5 class="font-tituloSeccion card-header">Información personal</h5>
                        <div class="frm-seccion card-body">  
                            <!--Fila -->
                            <div class="row"> 
                                <div class='col-md-4'>
                                    <!--Nombre-->
                                    <div class="form-group">
                                        <label for="txtNombre" class='control-label'>Nombre del paciente*</label>
                                        <input type="text" name="nombre" id="txtNombre" class='form-control' size='4' required>
                                    </div>
                                    <!--DUI-->
                                    <div class="form-group">
                                        <label for="txtDUI" class="w-50">DUI</label>
                                        <input type="text" name="dui" id="txtDUI" class="w-50 form-control" placeholder="00000000-0"required>
                                    </div>
                                    <!--Sexo-->
                                    <div class="form-group">
                                        <label for="selectSexo" class="w-50">Sexo</label>
                                        <select name="sexo" id="selectSexo" class="w-50 custom-select">
                                            <option selected>Select</option>
                                            <option value="m">Masculino</option>
                                            <option value="f">Femenino</option>
                                            <option value="o">Otro</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class='col-md-4'>
                                    <!--Apellidos-->
                                    <div class="form-group">
                                        <label for="txtApellido" class="w-50">Apellidos</label>
                                        <input type="text" name="apellido" id="txtApellido" class="form-control h-25" required>
                                    </div>
                                    <!--Fecha de nacimiento-->
                                    <div class="form-group">
                                        <label for="fechaNacimiento" class="w-50">Fecha de nacimiento</label>
                                        <input name="nacimiento" id="datepicker" width="276" />
                                    </div>
                                    <!--Tipo de sangre-->
                                    <div class="form-group">
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

                    <!--- Seccion informacion de contacto-->
                    <div class="card">
                        <h5 class="font-tituloSeccion card-header">Información de contacto</h5>
                        <div class="frm-seccion card-body">
                            <!--Fila -->
                            <div class="row"> 
                                <div class='col-md-5'>
                                    <!--Direccion-->
                                    <div class="form-group">
                                        <label for="areaDireccion"  >Dirección de domicilio actual</label>
                                        <input type="text" name="direccion" id="areaDireccion"  class="w-100 form-control"></textarea>
                                    </div> 
                                    <!--Telefono-->
                                    <div class="form-group">
                                        <label for="numeroTelefono" class="w-100">Teléfono</label>
                                        <input type="text" name="telefono" id="numeroTelefono" class="w-50 form-control" placeholder="0000-0000">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <!--Departamento-->
                                    <div class="form-group">
                                            <label for="selectDepartamento" class="w-50">Departamento</label>
                                            <select name="departamento" id="selectDepartamento" class="w-50 custom-select">
                                                <option selected>Select</option>
                                                <option value="a+">San Salvador</option>
                                            </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--- Seccion pariente mas cercano-->
                    <div class="card">
                        <h5 class="font-tituloSeccion card-header">Información de pariente más cercano</h5>
                        <div class="frm-seccion card-body">
                            <!-- Fila-->
                           
                            <div class="row">
                                <div class="col-md-4">
                                    <!--Nombre-->
                                     <div class="form-group">
                                        <label for="txtNombrePariente" class="w-50">Nombre completo</label>
                                        <input type="text" name="nombrep" id="txtNombrePariente" class="input-texto form-control">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <!--Apellido-->
                                     <div class="form-group">
                                        <label for="txtApellidoPariente" class="w-50">Apellidos</label>
                                        <input type="text" name="apellidop" id="txtApellidoPariente" class="form-control">
                                     </div>
                                </div>

                               
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <!--Direccion-->
                                    <div class="form-group">
                                        <label for="areaDireccion"  >Dirección de domicilio actual</label>
                                        <input type="text" name="direccionp" id="areaDireccion"  class="w-100 form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <!--Telefono-->
                                    <div class="form-group">
                                        <label for="txtTelefonoPariente" class="w-50">Teléfono</label>
                                        <input type="text" name="telefonop" id="txtTelefonoPariente" class="w-50 form-control" placeholder="0000-0000">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-4">
                                    <!--Parentezco-->
                                    <div class="form-group ">
                                        <label for="selectParentezco" class="w-50">Parentezco</label>
                                            <select name="parentezcop" id="selectParentezco" class="w-50 custom-select">
                                                <option selected>Select</option>
                                                <option value="p">Padre</option>
                                                <option value="m">Madre</option>
                                                <option value="o">Otro</option>
                                            </select>
                                    </div> 
                                </div>
                            </div>

                            
                        </div>
                        <hr></hr>
                        <!--Boton GENERAR-->
                        <div class="row">
                            <div class="w-100 form-group d-flex justify-content-center">
                                <button type="submit" name="submit" id="btn-generar" value="Guardar" class="btn-action">
                                    <i class="fas fa-save"></i>
                                    Generar expediente
                                </button>
                            </div>
                        </div>
                    </div>  
                </form>    
            </div>

        </div>
        
        <!--Gigjo DatePicker-->
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <script src="public/js/DatePicker.js"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </body>
</html>