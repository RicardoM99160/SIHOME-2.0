<?php

    include_once 'models/expediente.php';

    class buscarExpedienteModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //Para buscar un grupo de expedientes
        public function buscar($datos){
            $items = [];
            $query = $this->db->connect()->prepare(
                "SELECT * 
                FROM pacientes 
                WHERE idPacientes 
                LIKE '%".$datos['paciente']."%'");
            try{
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
                $query = null;
                return $items;
            }catch(PDOException $e){
                //echo $e->getMessage();
                return [];
            }
        }

        //Funcion para actualizar el estado de la sesión del usuario en la base de datos
        public function unsetUserSession(){
            $query = $this->db->connect()->prepare(
                "UPDATE personal
                SET estado = '1'
                WHERE emailPersonal = :email");
            $query->execute(['email' => $_SESSION['user']]);
            $query = null;
            include_once 'libs/logout.php';
        }
    }

?>