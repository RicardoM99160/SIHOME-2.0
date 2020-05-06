<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Generar Expediente</title>

        <!-- CSS propio -->
        <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/generarExpediente.css">
    </head>
    <?php require 'views/modo.php'?>
    <body>
        <!-- Validaciones -->
        <script type="text/javascript" src="<?php echo constant('URL');?>public/js/validaciones.js"></script>

        <?php require 'views/plantillaBase.php'; ?>

        <div class="wrapper">

            <?php require 'views/barraLateral.php';?>

            <!-- Contenido del sitio -->
            <div id="contenido" class="w-75 h-75 mx-auto">
                
                <!-- Título de la página actual -->
                <div id="font-tituloPagina">
                    
                    <h4>  Generar un expediente</h4>
                    
                </div>
                <?php
                    if(isset($_POST['submit']) && $_POST['submit'] == "Guardar" && isset($this->exp)){
                ?>
                <div class="alert alert-success alert-dismissible fade show">
                    El expediente <?php echo $this->exp;?> ha sido agregado con exito.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
                    }
                    if(isset($_POST['submit']) && $_POST['submit'] == "Guardar" && $this->exp == ''){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            Ha ocurrido un error al ingresar el expediente.
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        <?php
                            }
                ?>
                <!--- Formulario generar expediente-->
                <form id="form-generarExpediente" method="POST" action="<?php echo constant('URL');?>generarExpediente/generarE">
                    <!--- Seccion informacion personal-->
                    <div class="card">
                        <h5 class="font-tituloSeccion card-header">Información personal</h5>
                        <div class="frm-seccion card-body">  
                            <!--Fila -->
                            <div class="row"> 
                                <div class='col-md-4'>
                                    <!--Nombre-->
                                    <div class="form-group">
                                        <label for="txtNombre" class='control-label'>Nombre del paciente</label>
                                        <input type="text" maxlength="50" name="nombre" id="txtNombre" class='form-control' size='4' tabindex ="1" autofocus required onchange="validar('txtNombre', 'nombre', 0)">
                                        <div class="invalid-feedback">Ingrese un nombre válido.</div>
                                    </div>
                                    <!--DUI-->
                                    <div class="form-group">
                                        <label for="txtDUI" class="w-50">DUI</label>
                                        <input type="text" maxlength="10" name="dui" id="txtDUI" class="w-50 form-control" placeholder="00000000-0" required tabindex ="3" onchange="validar('txtDUI', 'DUI', 1)">
                                        <div class="invalid-feedback">Ingrese un DUI con formato válido. Ej: 12365487-9</div>
                                    </div>
                                    <!--Sexo-->
                                    <div class="form-group">
                                        <label for="selectSexo" class="w-50">Sexo</label>
                                        <select name="sexo" id="selectSexo" class="w-50 custom-select" required tabindex ="5">
                                            <option value="" selected>Select</option>
                                            <option value="FMNNO">Femenino</option>
                                            <option value="MSCLN">Maculino</option>
                                            <option value="OTROG">Otro</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class='col-md-4'>
                                    <!--Apellidos-->
                                    <div class="form-group">
                                        <label for="txtApellido" class="w-50">Apellidos</label>
                                        <input type="text" maxlength="50" name="apellido" id="txtApellido" class="form-control h-25" required tabindex ="2" onchange="validar('txtApellido', 'nombre', 2)">
                                        <div class="invalid-feedback">Ingrese un apellido válido.</div>
                                    </div>
                                    <!--Fecha de nacimiento-->
                                    <div class="form-group">
                                        <label for="fechaNacimiento" class="w-50">Fecha de nacimiento</label>
                                        <input type="date" name="nacimiento" id="fechaNacimiento" class="form-control h-25" width="276" min="1900-01-01" max="" tabindex ="4" onclick="validarFecha('fechaNacimiento')" />
                                    </div>
                                    <!--Tipo de sangre-->
                                    <div class="form-group">
                                        <label for="selectSangre" class="w-50">Tipo de sangre</label>
                                        <select name="sangre" id="selectSangre" class="w-50 custom-select" required tabindex ="6">
                                            <option selected>Select</option>
                                            <option value="TDS01">A+</option>
                                            <option value="TDS02">A-</option>
                                            <option value="TDS03">O-</option>
                                            <option value="TDS04">O+</option>
                                            <option value="TDS05">B+</option>
                                            <option value="TDS06">B-</option>
                                            <option value="TDS07">AB+</option>
                                            <option value="TDS08">AB-</option>
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
                                        <input type="text" maxlength="80" name="direccion" id="areaDireccion"  class="w-100 form-control" tabindex ="7" ></textarea>
                                    </div> 
                                    <!--Telefono-->
                                    <div class="form-group">
                                        <label for="numeroTelefono" class="w-100">Teléfono</label>
                                        <input type="text" maxlength="9" name="telefono" id="numeroTelefono" class="w-50 form-control" placeholder="0000-0000" tabindex ="9" onchange="validar('numeroTelefono', 'telefono', 3)">
                                        <div class="invalid-feedback">Ingrese un teléfono con formato válido. Ej: 7298-3579</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <!--Departamento-->
                                    <div class="form-group">
                                            <label for="selectDepartamento" class="w-50">Departamento</label>
                                            <select name="departamento" id="selectDepartamento" class="w-50 custom-select" required tabindex ="8">
                                                <option value="1" selected>Select</option>
                                                <option value="1">San Salvador</option>
                                                <option value="2">San Vicente</option>
                                                <option value="3">La Libertad</option>
                                                <option value="4">Ahuachapan</option>
                                                <option value="5">Sonsonate</option>
                                                <option value="5">Cuscatlan</option>
                                                <option value="7">Cabañas</option>
                                                <option value="8">La Paz</option>
                                                <option value="9">Santa Ana</option>
                                                <option value="10">Chalatenango</option>
                                                <option value="11">San Miguel</option>
                                                <option value="12">Morazán</option>
                                                <option value="13">Usulután</option>
                                                <option value="14">La Unión</option>
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
                                        <input type="text" maxlength="50" name="nombrep" id="txtNombrePariente" class="input-texto form-control" tabindex ="9" onchange="validar('txtNombrePariente', 'nombre', 4)">
                                        <div class="invalid-feedback">Ingrese un nombre válido.</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!--Apellido-->
                                     <div class="form-group">
                                        <label for="txtApellidoPariente" class="w-50">Apellidos</label>
                                        <input type="text" maxlength="50" name="apellidop" id="txtApellidoPariente" class="form-control" tabindex ="10" onchange="validar('txtApellidoPariente', 'nombre', 5)">
                                        <div class="invalid-feedback">Ingrese un apellido válido.</div>
                                     </div>
                                </div>

                               
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <!--Direccion-->
                                    <div class="form-group">
                                        <label for="areaDireccion"  >Dirección de domicilio actual</label>
                                        <input type="text" maxlength="100" name="direccionp" id="areaDireccion"  tabindex ="11" class="w-100 form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <!--Telefono-->
                                    <div class="form-group">
                                        <label for="txtTelefonoPariente" class="w-50">Teléfono</label>
                                        <input type="text" maxlength="9" name="telefonop" id="txtTelefonoPariente" tabindex ="12" class="w-50 form-control" placeholder="0000-0000" onchange="validar('txtTelefonoPariente', 'telefono', 6)">
                                        <div class="invalid-feedback">Ingrese un teléfono con formato válido. Ej: 7298-3579</div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-4">
                                    <!--Parentezco-->
                                    <div class="form-group ">
                                        <label for="selectParentezco" class="w-50">Parentezco</label>
                                            <select name="parentezcop" id="selectParentezco" class="w-50 custom-select" required tabindex ="13">
                                                <option selected>Select</option>
                                                <option value="Padre">Padre</option>
                                                <option value="Madre">Madre</option>
                                                <option value="Cónyuge">Cónyuge</option>
                                                <option value="Hermano">Hermano</option>
                                                <option value="Hermana">Hermana</option>
                                                <option value="Tio">Tío/Tía</option>
                                                <option value="Abuelo">Abuelo</option>
                                                <option value="Abuela">Abuela</option>
                                                <option value="Sobrino">Sobrino/a</option>
                                                <option value="Cuñado">Cuñado/a</option>
                                                <option value="Amigo">Amigo</option>
                                            </select>
                                    </div> 
                                </div>
                            </div> 
                            
                        </div>
                        <hr></hr>
                        <!--Boton GENERAR-->
                        <div class="row">
                            <div class="w-100 form-group d-flex justify-content-center">
                                <button type="submit" name="submit" id="btn-generar" value="Guardar" class="btn-action" disabled >
                                    <i class="fas fa-save"></i>
                                    Generar expediente
                                </button>
                            </div>
                        </div>
                    </div>  
                </form>

            </div>

        </div>

        <!--Gigjo DatePicker
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <script src="public/js/DatePicker.js"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
    </body>
    <script>
        $(document).ready(function(){
            $('#gExp').addClass('active');
            $('#bExp').removeClass('active');
            numeroCampos(7);
        });
    </script>
</html>