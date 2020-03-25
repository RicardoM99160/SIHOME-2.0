<?php

class datosClinicos{


    function generarToxicos(){
        $habitosToxicos = array("P0001"=>array("tabaco"=>array("habito"=>"Tabaco","detalle"=>"Una a dos veces por semana"),
                                                "alcohol"=>array("habito"=>"Alcohol","detalle"=>"Ocacionalmente en eventos sociales")),
                                "P0002"=>array("tabaco"=>array("habito"=>"Tabaco","detalle"=>"Consumo diario: 10 cigarrillos arpoximadamente"),
                                                "alcohol"=>array("habito"=>"Alcohol","detalle"=>"Una vez al mes")),
                                );
        return $habitosToxicos;
    }

    function generarFisiologicos(){                    
        $habitosFisiologicos = array("P0001"=>array("alimentacion"=>array("habito"=>"ALIMENTACIÓN","detalle"=>"3 veces al día, un refrigerio por la mañana"),
                                                    "dihuresis"=>array("habito"=>"DIHURESIS","detalle"=>"Normal, poco concentrada en los ultimos meses."),
                                                    "ejercicio"=>array("habito"=>"EJERCICIO","detalle"=>"4 veces por semana")),
                                     "P0002"=>array("alimentacion"=>array("habito"=>"ALIMENTACIÓN","detalle"=>"3 veces al día con dos refrigerios"),
                                                    "ejercicio"=>array("habito"=>"EJERCICIO","detalle"=>"5 veces por semana")),
                            );
                            return $habitosFisiologicos;
                                }

        function generarInfancia(){
        $enfermedadesInfancia = array("P0001"=>array("E0001"=>array("enfermedad"=>"VARICELA","edadEnfermedad"=>"Diagnostico a los 12 años","detalle"=>"Se trató la enfermedad con normalidad")),
                                      "P0002"=>array("E0001"=>array("enfermedad"=>"ASMA","edadEnfermedad"=>"Diagnostico a los 3 años","detalle"=>"Se ha hecho seguimiento en el tratamiento de la enfermedad, actualmente controlada")),
                                );
                                return $enfermedadesInfancia;
                            }

        function generarEnfermedades(){
        $enfermedades = array("P0001"=>array("E0001"=>array("enfermedad"=>"HIPERTENSION","edadEnfermedad"=>"Diagnostico a los 21 años","detalle"=>"Se está tratando la enfermedad con normalidad, Seguimiento rigido de dieta")),
                            "P0002"=>array("E0001"=>array("enfermedad"=>"DIABETES","edadEnfermedad"=>"Diagnostico a los 32 años","detalle"=>"Se ha hecho seguimiento en el tratamiento de la enfermedad, actualmente controlada no necesita tratamiendo con Insulina")),
                            );
                            return $enfermedades;
                        }

        function generarAlergias(){
        $alergias = array("P0001"=>array("Penicilina", "Latex", "Moho"),
                          "P0002"=>array("Pelo de mascotas", "Latex"));
                          return $alergias;
        }

        function generarMedicamentos(){
        $medicamentos = array("P0001"=>array("enalapril"=>array("medicamento"=>"Enalapril", "dosis"=>"50 mg al día"),
                                             "atarax"=>array("medicamento"=>"ATARAX","dosis"=>"25 mg cuando presenta alergias")),
                              "P0002"=>array("enalapril"=>array("medicamento"=>"Enalapril", "dosis"=>"50 mg al día"),));
        return $medicamentos;
        }

        function generarAntecedentes(){
        $antecedentes = array("P0001"=>array("E0001"=>array("enfermedad"=>"HIPERTENSION","parentesco"=>"Madre y Abuela materna", "detalle"=>"Ambas padecen la enfermedad")),
                              "P0002"=>array("E0001"=>array("enfermedad"=>"DIABETES","parentesco"=>"Abuelo paterno","detalle"=>"Abuelo por parte de padre presenta patología.")),);
                
                              return $antecedentes;
                            }

    public function obtenerToxicos($idPacienteToxico){

        $arrToxicos = $this->generarToxicos();
        if(array_key_exists($idPacienteToxico, $arrToxicos)){

            foreach($arrToxicos[$idPacienteToxico] as $idHabito=>$datos)
 	        {
                 echo ' 
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="alcoholH" id="alcoholHabito" class="form-control text-uppercase text-center" value="'.$datos["habito"].'" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="alcoholV" id="alcoholValor" class="form-control" value="'.$datos["detalle"].'" disabled>
                                    </div>
                                </div>
                         ';
             }

        }
        else{
            echo '
            No se han registrado Habitos Toxicos';
        }

    }

    public function obtenerFisiologicos($idPacienteToxico){

        $arrFisiologicos = $this->generarFisiologicos();
        if(array_key_exists($idPacienteToxico, $arrFisiologicos)){

            foreach($arrFisiologicos[$idPacienteToxico] as $idHabito=>$datos)
 	        {
                 echo ' 
                                <div class="row no-gutters my-2">
                                    <div class="col-2">
                                        <input type="text" name="habitoN" id="habitoNombre" class="form-control text-uppercase text-center" value="'.$datos["habito"].'" disabled>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="habitoV" id="habitoValor" class="form-control" value="'.$datos["detalle"].'" disabled>
                                    </div>
                                </div>
                         ';
             }

        }
        else{
            echo '
            No se han registrado Habitos Fisiologicos';
        }

    }

    public function obtenerInfancia($idPacienteInfancia){

        $arrInfancia = $this->generarInfancia();
        if(array_key_exists($idPacienteInfancia, $arrInfancia)){

            foreach($arrInfancia[$idPacienteInfancia] as $idEnfermedad=>$datos)
 	        {
                 echo ' 
                 <div class="row no-gutters my-2">
                 <div class="col-2">
                     <input type="text" name="enfermedad1I" id="enfermedad1Infancia" class="form-control text-uppercase text-center h-100" value="'.$datos["enfermedad"].'" disabled>
                 </div>
                 <div class="col-7">
                     <div id="enfermedad1IDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                         <p class="font-weight-bold">'.$datos["edadEnfermedad"].'</p>
                         <p>'.$datos["detalle"].'</p>                                     
                     </div>
                 </div>
             
                         ';
             }

        }
        else{
            echo '
            No se han registrado Enfermedades de la infancia';
        }

    }

    public function obtenerEnfermedad($idPacienteEnfermedad){

        $arrEnfermedad = $this->generarEnfermedades();
        if(array_key_exists($idPacienteEnfermedad, $arrEnfermedad)){

            foreach($arrEnfermedad[$idPacienteEnfermedad] as $idEnfermedad=>$datos)
 	        {
                 echo ' 
                 <div class="row no-gutters my-2">
                 <div class="col-2">
                     <input type="text" name="enfermedad1I" id="enfermedad1I" class="form-control text-uppercase text-center h-100" value="'.$datos["enfermedad"].'" disabled>
                 </div>
                 <div class="col-7">
                     <div id="enfermedad1IDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                         <p class="font-weight-bold">'.$datos["edadEnfermedad"].'</p>
                         <p>'.$datos["detalle"].'</p>                                     
                     </div>
                 </div>
             
             ';
             }

        }
        else{
            echo '
            No se han registrado Enfermedades';
        }

    }

    public function obtenerAntecedentes($idPacienteEnfermedad){

        $arrEnfermedad = $this->generarAntecedentes();
        if(array_key_exists($idPacienteEnfermedad, $arrEnfermedad)){

            foreach($arrEnfermedad[$idPacienteEnfermedad] as $idEnfermedad=>$datos)
 	        {
                 echo ' 
                 <div class="row no-gutters my-2">
                 <div class="col-2">
                     <input type="text" name="enfermedad1I" id="enfermedad1I" class="form-control text-uppercase text-center h-100" value="'.$datos["enfermedad"].'" disabled>
                 </div>
                 <div class="col-7">
                     <div id="enfermedad1IDescripcion" class="px-3 py-3 form-control campo-descriptivo">
                         <p class="font-weight-bold">'.$datos["parentesco"].'</p>
                         <p>'.$datos["detalle"].'</p>                                     
                     </div>
                 </div>
             
             ';
             }

        }
        else{
            echo '
            No se han registrado Antecedentes Familiares';
        }

    }

    public function obtenerAlergias($idPacienteAlergia){

        $arrAlergia = $this->generarAlergias();
        if(array_key_exists($idPacienteAlergia, $arrAlergia)){

            foreach($arrAlergia[$idPacienteAlergia] as $datos)
 	        {
                 echo ' 
                 <li class="list-group-item">'.$datos.'</li>
                         ';
             }

        }
        else{
            echo '
            No se han registrado Alergias';
        }

    }

    public function obtenerMedicamentos($idPacienteMedicamento){

        $arrMedicamento = $this->generarMedicamentos();
        if(array_key_exists($idPacienteMedicamento, $arrMedicamento)){

            foreach($arrMedicamento[$idPacienteMedicamento] as $idMedicamento=>$datos)
 	        {
                 echo ' 
                 <p class="font-weight-bold">'.$datos["medicamento"].'</p>
                 <p>'.$datos["dosis"].'</p> 
             
             ';
             }

        }
        else{
            echo '
            <p>No se le suministran medicamentos</p>';
        }

    }
}


?>