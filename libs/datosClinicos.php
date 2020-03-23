<?php

class clinico{


    function generarToxicos(){
        $habitosToxicos = array("P0001"=>array("tabaco"=>array("habito"=>"Tabaco","detalle"=>"Una a dos veces por semana"),
                                                "alcohol"=>array("habito"=>"Alcohol","detalle"=>"Ocacionalmente en eventos sociales")),
                                "P0002"=>array("tabaco"=>array("habito"=>"Tabaco","detalle"=>"Consumo diario: 10 cigarrillos arpoximadamente"),
                                                "alcohol"=>array("habito"=>"Alcohol","detalle"=>"Una vez al mes")),
                                );
    }

    function generarFisiologicos(){                    
        $habitosFisiologicos = array("P0001"=>array("alimentacion"=>array("habito"=>"ALIMENTACIÓN","detalle"=>"3 veces al día, un refrigerio por la mañana"),
                                                    "dihuresis"=>array("habito"=>"DIHURESIS","detalle"=>"Normal, poco concentrada en los ultimos meses."),
                                                    "ejercicio"=>array("habito"=>"EJERCICIO","detalle"=>"4 veces por semana")),
                                     "P0002"=>array("alimentacion"=>array("habito"=>"ALIMENTACIÓN","detalle"=>"3 veces al día con dos refrigerios"),
                                                    "ejercicio"=>array("habito"=>"EJERCICIO","detalle"=>"5 veces por semana")),
                            );
                                }

        function generarInfancia(){
        $enfermedadesInfancia = array("P0001"=>array("E0001"=>array("enfermedad"=>"VARICELA","edadEnfermedad"=>"Diagnostico a los 12 años","detalle"=>"Se trató la enfermedad con normalidad")),
                                      "P0002"=>array("E0001"=>array("enfermedad"=>"ASMA","edadEnfermedad"=>"Diagnostico a los 3 años","detalle"=>"Se ha hecho seguimiento en el tratamiento de la enfermedad, actualmente controlada")),
                                );
                            }

        function generarEnfermedades(){
        $enfermedades = array("P0001"=>array("E0001"=>array("enfermedad"=>"HIPERTENSION","edadEnfermedad"=>"Diagnostico a los 21 años","detalle"=>"Se está tratando la enfermedad con normalidad, Seguimiento rigido de dieta")),
                            "P0002"=>array("E0001"=>array("enfermedad"=>"DIABETES","edadEnfermedad"=>"Diagnostico a los 32 años","detalle"=>"Se ha hecho seguimiento en el tratamiento de la enfermedad, actualmente controlada no necesita tratamiendo con Insulina")),
                            );
                        }

        function generarAlergias(){
        $alergias = array("P0001"=>array("Penicilina", "Latex", "Moho"),
                          "P0002"=>array("Pelo de mascotas", "Latex"));
        }

        function generarMedicamentos(){
        $medicamentos = array("P0001"=>array("Enalapril, 50 mg al día"));
        }

        function generarAntecedentes(){
        $antecedentes = array("P0001"=>array("E0001"=>array("enfermedad"=>"HIPERTENSION","parentesco"=>"Madre y Abuela materna"=>"Ambas padecen la enfermedad")),
                              "P0002"=>array("E0001"=>array("enfermedad"=>"DIABETES","parentesco"=>"Abuelo paterno","detalle"=>"Abuelo por parte de padre presenta patología.")),);
    }

    public function obtenerToxicos($idPacienteToxico){
        if(array_key_exists($idPacienteToxico, $this->generarToxicos)){
            
        }

    }
}


?>