<?php /*
class cirugia{
    var $idPacientecirugia=  'P0001';


    public function generarDatosConsulta(){
        $cirugias = array
        (
            "P0001"=>array("C00001"=>array("nombreDoctor"=>"Julio Salazar", "nombreEnfermera"=>"Luisa Lopez", "fechaCirugía"=>"15/03/2020", "horaConsulta"=>"15:00", "comentarioConsulta"=>"Fiebre", "diagnostico"=>"El paciente presentaba temperatura elevada, presión normal"),
                          "C00002"=>array("nombreDoctor"=>"Julio Salazar", "nombreEnfermera"=>"Luisa Lopez","fechaConsulta"=>"15/03/2020", "horaConsulta"=>"09:40", "comentarioConsulta"=>"Dolor", "diagnostico"=>"El paciente presenta dolor abdominal")),
            "P0002"=>array("C00001"=>array("nombreDoctor"=>"Guillermo Oseggueda", "fechaConsulta"=>"11/03/2020", "horaConsulta"=>"11:00", "comentarioConsulta"=>"Alergia", "diagnostico"=>"Urticaria presentada moderada" ),),
        );
  
    return $consultas;
    }


    public function listarConsultas(){

        $numConsultas = 1;
        $arrConsultas = $this->generarDatosConsulta();
        if(array_key_exists($this->idPacienteConsulta, $arrConsultas)){

            foreach($arrConsultas[$this->idPacienteConsulta] as $idConsultas=>$datos)
 	        {
                 echo ' 
                         <tr>
                                    <th scope="row">'.$numConsultas.'</th>
                                    <td>'.$idConsultas.'</td>
                                    <td>'.$datos["nombreDoctor"].'</td>
                                    <td>'.$datos["fechaConsulta"].'</td>
                                    <td>'.$datos["horaConsulta"].'</td>
                                    <td>'.$datos["comentarioConsulta"].'</td>
                                    <td>
                                    <button class="btn h-25">
                                       <svg id="i-external" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">                                                <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" />
                                        </svg>
                                    </button>
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


    public function nConsultas(){

        $arrConsultas = $this->generarDatosConsulta();
        $numeConsultas = sizeof($arrConsultas[$this->idPacienteConsulta]);
    return $numeConsultas;
    }

}*/
?>