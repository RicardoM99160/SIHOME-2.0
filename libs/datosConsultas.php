<?php
class consulta{


    public function listarConsultas($idPacienteConsulta){

        $numConsultas = 1;
        $arrConsultas = $_SESSION['consultas'];
        if(array_key_exists($idPacienteConsulta, $arrConsultas)){

            foreach($arrConsultas[$idPacienteConsulta] as $idConsultas=>$datos)
 	        {
                 echo ' 
                         <tr>
                                    <th scope="row">'.$numConsultas.'</th>
                                    <td>'.$idConsultas.'</td>
                                    <td>'.$datos["nombreDoctor"].'</td>
                                    <td>'.$datos["fechaConsulta"].'</td>
                                    <td>'.$datos["horaConsulta"].'</td>
                                    <td>'.$datos["motivoConsulta"].'</td>
                                    <td>
                            <a class="btn btn-default" href="';echo constant('URL').'visualizarExpediente">
                                <i class="fas fa-external-link-alt"></i>
                            </a> 
                        </td>
                         </tr>
                         ';
                     $numConsultas += 1;
                }
        }
        else{
          echo '
          <tr>
          <th colspan=6>No se han encontrado Consultas<td>
          </tr>
          ';
        }


      }


    public function nConsultas($idPacienteConsulta){

        $arrConsultas = $_SESSION['consultas'];
        if(array_key_exists($idPacienteConsulta, $arrConsultas)){

            $numeConsultas = sizeof($arrConsultas[$idPacienteConsulta]);
        }
        else{
            $numeConsultas = 0;
        }
    return $numeConsultas;
    }

    public function guardarConsultas($motivoConsulta, $enfermedad, $antecedente, $temperatura, $presion, $pulso, $frecuencia, $diagnostico, $orden){

        $datosEstaticos =  array(
            "P0001"=>array("C00001"=>array(
                            "nombreDoctor"=>"Julio Salazar", 
                            "fechaConsulta"=>"15/03/2020", 
                            "horaConsulta"=>"15:00", 
                            "motivoConsulta"=>"Arritmia",
                            "enfermedadConsulta"=>"Arteriosclerosis",
                            "antecedenteConsulta"=>"Cuadros de hipertension y arritmias casdíacas con algunas complicaciones", 
                            "temperatura"=>"37.5", 
                            "presion"=>"130/100",
                            "pulso"=> "130",
                            "frecuencia"=> "60",
                            "diagnostico"=>"El paciente presenta pulso elevado y desestabilización cardíaca",
                            "orden"=>"Hemograma completo"),
                          "C00002"=>array("nombreDoctor"=>"Julio Salazar", "fechaConsulta"=>"15/03/2020", "horaConsulta"=>"09:40", "motivoConsulta"=>"Dolor", "diagnostico"=>"El paciente presenta dolor abdominal")),
            "P0002"=>array("C00001"=>array("nombreDoctor"=>"Guillermo Osegueda", "fechaConsulta"=>"11/03/2020", "horaConsulta"=>"11:00", "motivoConsulta"=>"Alergia", "diagnostico"=>"Urticaria presentada moderada" ),),
        );
        $_SESSION['consultas'] = array_merge((array)$_SESSION['consultas'], (array)$datosEstaticos);
        
        $idActual = $_SESSION['idPaciente'];
        $nuevoidConsulta = 'C'.str_pad(($this->nConsultas($idActual)+1), 5, '0', STR_PAD_LEFT);

        $nuevaCon =array(
                            "nombreDoctor"=>$_SESSION['nombre']. ' ' .$_SESSION['apellido'], 
                            "fechaConsulta"=>date('d/m/Y'), 
                            "horaConsulta"=>date('H:i'), 
                            "motivoConsulta"=>$motivoConsulta,
                            "enfermedadConsulta"=>$enfermedad,
                            "antecedenteConsulta"=>$antecedente, 
                            "temperatura"=>$temperatura, 
                            "presion"=>$presion,
                            "pulso"=> $presion,
                            "frecuencia"=> $frecuencia,
                            "diagnostico"=>$diagnostico,
                            "orden"=>$orden
                );
        
        $_SESSION['consultas'][$idActual][$nuevoidConsulta] = array_merge((array)$_SESSION['consultas'], (array)$nuevaCon);

    }

}
?>