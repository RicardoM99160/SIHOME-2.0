<?php

    include_once 'models/expediente.php';

    class visualizarExpedienteModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //Para buscar un solo expediente
        public function obtenerExpediente($id){
            $item = new Expediente();
            $query = $this->db->connect()->prepare('SELECT * FROM pacientes WHERE idPacientes = :idPaciente');

            try{
                $query->execute(['idPaciente' => $id]);

                while($row = $query->fetch()){
                    $item->codigo = $row['idPacientes'];
                    $item->nombre = $row['nombrePaciente'] . $row['apellidoPaciente'];
                    $item->dui = $row['duiPaciente'];
                    $item->fechaCreacion = $row['fechaCreacion'];
                    $item->ultimaConsulta = "Modificar sentencia SQL";
                }

                return $item;
            }catch(PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }

        public function prueba(){
            return "modelo VisualizarExpediente";
        }
    }

?>