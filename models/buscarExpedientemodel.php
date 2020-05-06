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
                    $item->ultimaConsulta = $row['edad'];

                    array_push($items, $item);
                }
                $query = null;
                return $items;
            }catch(PDOException $e){
                //echo $e->getMessage();
                return [];
            }
        }

        public function filtrar($filtro, $orden, $fecha1, $fecha2, $filtrarEdad, $edad1, $edad2){

            $items = [];
            //***Todos los filtros
            if($orden != null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad != null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE fechaCreacion  
                    BETWEEN '$fecha1' AND '$fecha2' AND edad BETWEEN $edad1 AND $edad2 ORDER BY fechaCreacion $orden");
            }

            //***Sólo orden
            if($orden != null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad == null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE idPacientes 
                    LIKE '%$filtro%' ORDER BY fechaCreacion $orden");
            }

            //***Orden y fecha
            if ($orden != null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad == null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE fechaCreacion  
                    BETWEEN '$fecha1' AND '$fecha2' ORDER BY fechaCreacion $orden");
            }

            //***Orden y edades
            if ($orden != null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad != null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE edad 
                    BETWEEN $edad1 AND $edad2 ORDER BY fechaCreacion $orden");
                
            }

            //***Sólo fecha
            if ($orden == null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad == null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE fechaCreacion  
                    BETWEEN '$fecha1' AND '$fecha2'");
            }

            //***Fecha y edades
            if ($orden == null && ($fecha1 != null && $fecha2 != null) && $filtrarEdad != null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE fechaCreacion  
                    BETWEEN '$fecha1' AND '$fecha2' AND edad BETWEEN $edad1 AND $edad2");
            }

            //***Sólo edades
            if ($orden == null && ($fecha1 == null && $fecha2 == null) && $filtrarEdad != null)
            {
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE edad 
                    BETWEEN $edad1 AND $edad2");
            }
            else{
                $query = $this->db->connect()->prepare(
                    "SELECT * 
                    FROM pacientes 
                    WHERE idPacientes 
                    LIKE '%$filtro%'");
            }
            
            try{
                $query->execute();

                while($row = $query->fetch()){
                    $item = new Expediente();
                    $item->codigo = $row['idPacientes'];
                    $item->nombre = $row['nombrePaciente'] ." ". $row['apellidoPaciente'];
                    $item->dui = $row['duiPaciente'];
                    $item->fechaCreacion = $row['fechaCreacion'];
                    $item->ultimaConsulta = $row['edad'];

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