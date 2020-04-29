<?php

    include_once 'models/expediente.php';

    class buscarExpedienteModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //Para buscar un grupo de expedientes
        public function buscar($datos){
            $items = [];
            try{
                $query = $this->db->connect()->prepare("SELECT * FROM pacientes WHERE idPacientes LIKE '%".$datos['paciente']."%'");
                $query->execute();

                while($row = $query->fetch()){
                    $item = new Expediente();
                    $item->codigo = $row['idPacientes'];
                    $item->nombre = $row['nombrePaciente'] ." ". $row['apellidoPaciente'];
                    $item->dui = $row['duiPaciente'];
                    $item->fechaCreacion = $row['fechaCreacion'];
                    $item->ultimaConsulta = "Modificar sentencia SQL";

                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                //echo $e->getMessage();
                return [];
            }
        }
    }

?>