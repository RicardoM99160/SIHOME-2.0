<?php

 class paciente{
    

public function __construct ()
{
  $datosEstaticos = array ("P0001"=>array(
    "nombre"=>"Ricardo José",
    "apellido" => "Majano de Paz",
    "dui"=>"12345678-9",
    "fechaCreacion"=> "10/03/2015",
    "fechaNacimiento"=>"26/07/1999",
    "sexo"=>"Masculino",
    "tipoSangre"=>"ORH+",
    "direccion"=>"Colonia San Ricardo casa #119, San Salvador",
    "departamento"=>"San Salvador",
    "telefono"=>"7000-0000",
    "nombrePariente"=>"Gabriel",
    "apellidoPariente"=>"Majano",
    "direccionPariente"=>"Colonia San Ricardo casa #119, San Salvador",
    "telefonoPariente"=>"7000-0001",
    "parentesco"=>"Hermano"
  ),
  "P0002"=>array(
    "nombre"=>"Oscar",
    "apellido" => "Guillermo Osegueda",
    "dui"=>"12345668-9",
    "fechaCreacion"=> "10/02/2010",
    "fechaNacimiento"=>"26/04/1990",
    "sexo"=>"Masculino",
    "tipoSangre"=>"ORH-",
    "direccion"=>"Colonia San Oscar casa #19, Santa Tecla",
    "departamento"=>"La Libertad",
    "telefono"=>"7111-1111",
    "nombrePariente"=>"Oscar",
    "apellidoPariente"=>"Palacios",
    "direccionPariente"=>"Colonia San Oscar casa #19, Santa Tecla",
    "telefonoPariente"=>"7111-1110",
    "parentesco"=>"Tio"
  ),
  "P0003"=>array(
    "nombre"=>"Brenda ",
    "apellido" => "Palencia Martinez",
    "dui"=>"12345698-9",
    "fechaCreacion"=> "21/09/2007",
    "fechaNacimiento"=>"27/07/1988",
    "sexo"=>"Femenino",
    "tipoSangre"=>"AB+",
    "direccion"=>"Colonia San Brenda casa #3A-1, San Marcos",
    "departamento"=>"San Salvador",
    "telefono"=>"7222-2222",
    "nombrePariente"=>"Andrea",
    "apellidoPariente"=>"Palencia Martinez",
    "direccionPariente"=>"Colonia San Brenda casa #3A-1, San Marcos",
    "telefonoPariente"=>"7222-2220",
    "parentesco"=>"Hermana"
  ),
  "P0004"=>array(
    "nombre"=>"Gerardo Alexander",
    "apellido" => "Rivera Moreno",
    "dui"=>"12345678-7",
    "fechaCreacion"=> "20/04/2005",
    "fechaNacimiento"=>"26/07/1979",
    "sexo"=>"Masculino",
    "tipoSangre"=>"ORH+",
    "direccion"=>"Colonia San Gerardo casa #116, San Martin",
    "departamento"=>"San Salvador",
    "telefono"=>"7333-3333",
    "nombrePariente"=>"Yesenia",
    "apellidoPariente"=>"Rivera Moreno",
    "direccionPariente"=>"Colonia San Gerardo casa #116, San Martin",
    "telefonoPariente"=>"7333-3330",
    "parentesco"=>"Hermana"
  ),
  "P0005"=>array(
    "nombre"=>"José Ricardo",
    "apellido" => "Espinal",
    "dui"=>"87654321-9",
    "fechaCreacion"=> "14/08/2010",
    "fechaNacimiento"=>"23/12/1989",
    "sexo"=>"Masculino",
    "tipoSangre"=>"ORH-",
    "direccion"=>"Colonia San José casa #119, San Salvador",
    "departamento"=>"San Salvador",
    "telefono"=>"",
    "nombrePariente"=>"",
    "apellidoPariente"=>"",
    "nombrePariente"=>"",
    "direccionPariente"=>"",
    "telefonoPariente"=>"",
    "parentesco"=>""
  ),
  "P0006"=>array(
    "nombre"=>"Oscar Alejandro",
    "apellido" => "Palacios Miranda",
    "dui"=>"12345678-1",
    "fechaCreacion"=> "01/03/2009",
    "fechaNacimiento"=>"16/01/1969",
    "sexo"=>"Masculino",
    "tipoSangre"=>"",
    "direccion"=>"Colonia San Ricardo casa #119, San Salvador",
    "departamento"=>"",
    "telefono"=>"",
    "nombrePariente"=>"",
    "apellidoPariente"=>"",
    "nombrePariente"=>"",
    "direccionPariente"=>"",
    "telefonoPariente"=>"",
    "parentesco"=>""
  )

);
  $_SESSION['pacientes'] = array_merge((array)$_SESSION['pacientes'], (array)$datosEstaticos);
}
  
  public function buscarPaciente($idBuscarPaciente){

    $arrPacientes = $_SESSION['pacientes'];
    if(array_key_exists($idBuscarPaciente, $arrPacientes)){
      echo '
      <tr>
                        <th scope="row">1</th>
                        <td>'.$idBuscarPaciente.'</td>
                        <td>'.$arrPacientes[$idBuscarPaciente]['nombre']. ' '.$arrPacientes[$idBuscarPaciente]['apellido'].'</td>
                        <td>'.$arrPacientes[$idBuscarPaciente]['dui'].'</td>
                        <td>'.$arrPacientes[$idBuscarPaciente]['fechaCreacion'].'</td>
                        <td>'.$arrPacientes[$idBuscarPaciente]['fechaNacimiento'].'</td>
                        <td>
                            <a class="btn btn-default" href="';echo constant('URL').'visualizarExpediente">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                      </tr>
      
      ';
    }
    else{
      echo '
      <tr>
      <th colspan=6>No se han encontrado pacientes<td>
      </tr>
      ';
    }
  }

  public function mostrarNombreVE($idBuscarPaciente){

    $arrPacientes = $_SESSION['pacientes'];
    if(array_key_exists($idBuscarPaciente, $arrPacientes)){
      echo '
      <div class="row px-3 py-3 no-gutters">
                        <div class="col-9"> 
                            <div class="row my-2">
                                <!-- Nombre completo -->
                                <div class="col"> 
                                    <h3 id="font-nombreCompleto">'.$arrPacientes[$idBuscarPaciente]['nombre']. ' '.$arrPacientes[$idBuscarPaciente]['apellido'].'</h3>
                                </div> 
                            </a> 
                            </div>
                            <hr>
                            <!-- Fila 1 --> 
                            <div class="row form-group no-gutters">
                                <!--Fecha de nacimiento -->
                                <div class="col-3 px-1">
                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value='.$arrPacientes[$idBuscarPaciente]['fechaCreacion'].' class="form-control" disabled>
                                </div>
                                <!-- Sexo -->
                                <div class="col-2 px-1">
                                    <label for="sexo">Sexo</label>
                                    <input type="text" name="sexo" id="sexo" value="'.$arrPacientes[$idBuscarPaciente]['sexo'].'" class="form-control" disabled>
                                </div>
                                <!--DUI-->
                                <div class="col-3 px-1">
                                    <label for="dui">DUI</label>
                                    <input type="text" name="dui" id="dui" value='.$arrPacientes[$idBuscarPaciente]['dui'].' class="form-control" disabled>
                                </div>
                                <!--Tipo de sangre -->
                                <div class="col-2 px-1">
                                    <label for="tipoSangre">Tipo de sangre</label>
                                    <input type="text" name="tipoSangre" id="tipoSangre" value="'.$arrPacientes[$idBuscarPaciente]['tipoSangre'].'" class="form-control" disabled>
                                </div>
                            </div>
                            <!-- Fila 2 --> 
                            <div class="row form-group no-gutters">
                                <!--Direccion -->
                                <div class="col-7 px-1">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" value="'.$arrPacientes[$idBuscarPaciente]['direccion'].'" class="form-control" disabled>
                                </div>
                                <!--Telefono-->
                                <div class="col-3 px-1">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" value="'.$arrPacientes[$idBuscarPaciente]['telefono'].'" class="form-control" disabled>
                                </div>
                            </div>
                        </div> 
                         
                    </div>
      ';
    }
    else{
      echo '
      <div class="row px-3 py-3 no-gutters">
        <div class="col-9">
          <div class="row my-2">
            <!-- mensaje error -->
            <div class="col"> 
            <h3 id="font-nombreCompleto">No se ha encontrado información</h43>
          </div> 
        </div>
      </div> 
      ';
    }
  }


  public function mostrarNombreC($idBuscarPaciente){

    $arrPacientes = $_SESSION['pacientes'];
    if(array_key_exists($idBuscarPaciente, $arrPacientes)){
      echo '
      <div class="frm-seccion card-body">   
                                    <div class="col"> 
                                        <!--Fila 1--> 
                                        <div class="row">
                                          <div class="row form-group no-gutters">
                                                <!--Nombre completo -->
                                                <div class="col-9 px-1">
                                                    <label for="fechaNacimiento">Nombre del paciente</label>
                                                    <input type="text" name="" id="" value="'.$arrPacientes[$idBuscarPaciente]['nombre']. ' ' . $arrPacientes[$idBuscarPaciente]['apellido'].'" class="form-control" disabled>
                                                </div>
                                                <!--DUI-->
                                                <div class="col-3 px-1">
                                                    <label for="dui">DUI</label>
                                                    <input type="text" name="dui" id="dui" value="'.$arrPacientes[$idBuscarPaciente]['dui'].'" class="form-control" disabled>
                                                </div> 
                                            </div>  
                                            <!-- Fila 2 --> 
                                            <div class="row form-group no-gutters">
                                                <!--Fecha de nacimiento -->
                                                <div class="col-5 px-1">
                                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="'.$arrPacientes[$idBuscarPaciente]['fechaNacimiento']. '" class="form-control" disabled>
                                                </div>
                                                <!-- Sexo -->
                                                <div class="col-4 px-1">
                                                    <label for="sexo">Sexo</label>
                                                    <input type="text" name="sexo" id="sexo" value="'.$arrPacientes[$idBuscarPaciente]['sexo']. '" class="form-control" disabled>
                                                </div>
                                                <!--Tipo de sangre -->
                                                <div class="col-3 px-1">
                                                    <label for="tipoSangre">Tipo de sangre</label>
                                                    <input type="text" name="tipoSangre" id="tipoSangre" value="'.$arrPacientes[$idBuscarPaciente]['tipoSangre']. '" class="form-control" disabled>
                                                </div> 
                                        
                                            </div>                             
                                            <!-- Fila 3 -->  
                                            <div class="row form-group no-gutters">
                                                <!--Direccion -->
                                                <div class="col-9 px-1">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" name="direccion" id="direccion" value="'.$arrPacientes[$idBuscarPaciente]['direccion']. '" class="form-control" disabled>
                                                </div>
                                                <!--Telefono-->
                                                <div class="col-3 px-1">
                                                    <label for="telefono">Teléfono</label>
                                                    <input type="text" name="telefono" id="telefono" value="'.$arrPacientes[$idBuscarPaciente]['telefono']. '" class="form-control" disabled>
                                                </div>
                                            </div> 
                                        </div>
                                        </div>
                                        </div>
      ';
    }
    else{
      echo '';
    }
}

public function agregarPaciente($nombre, $apellido, $dui, $fechaNa, $sexo, $tipoSangre,$direccion,$departamento,$telefono,$nombrePariente,$apellidoPariente,$direccionP,$telefonoP,$parentesco){

  
  $nuevoid = 'P'.str_pad((sizeof($_SESSION['pacientes'])+1), 4, '0', STR_PAD_LEFT);
  $nuevoarr = array($nuevoid => array(
    "nombre"=>$nombre,
    "apellido" => $apellido,
    "dui"=>$dui,
    "fechaCreacion"=> date('d/m/Y'),
    "fechaNacimiento"=>$fechaNa,
    "sexo"=>$sexo,
    "tipoSangre"=>$tipoSangre,
    "direccion"=>$direccion,
    "departamento"=>$departamento,
    "telefono"=>$telefono,
    "nombrePariente"=>$nombrePariente,
    "apellidoPariente"=>$apellidoPariente,
    "direccionPariente"=>$direccionP,
    "telefonoPariente"=>$telefonoP,
    "parentesco"=>$parentesco
  ),);

  
  $_SESSION['pacientes'] = array_merge((array)$_SESSION['pacientes'], (array)$nuevoarr);

}

}

     
?>