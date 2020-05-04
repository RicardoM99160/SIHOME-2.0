<?php

include_once 'models/expediente.php';
include_once 'models/historialClinico.php';

class editarHistoriamodel extends Model{

    public function __construct(){
        parent::__construct();
    }

    //Para obtener el expediente del paciente actual
    public function obtenerExpediente($id){
        $item = new Expediente();
        $query = $this->db->connect()->prepare(
            "SELECT pacientes.idPacientes, pacientes.nombrePaciente, pacientes.apellidoPaciente, pacientes.duiPaciente, 
            pacientes.fechaNacimiento, pacientes.fechaCreacion, pacientes.edad, tipoSangre.nombreTipo AS 'tipoSangre', 
            genero.nombreGenero AS 'genero', telefonosPaciente.numeroTelefono AS 'telefono', direcciones.direccion 
            FROM pacientes 
            INNER JOIN tipoSangre ON pacientes.idTipoSangre = tipoSangre.idTipoSangre 
            INNER JOIN genero ON pacientes.idGenero = genero.idGenero
            LEFT JOIN telefonosPaciente ON pacientes.idPacientes = telefonosPaciente.pacientes_idPacientes
            LEFT JOIN direcciones ON pacientes.idPacientes = direcciones.pacientes_idPacientes
            WHERE pacientes.idPacientes = :idPaciente ");
        try{
            $query->execute(['idPaciente' => $id]);

            while($row = $query->fetch()){
                $item->codigo = $row['idPacientes'];
                $item->nombre = $row['nombrePaciente'] . " " . $row['apellidoPaciente'];
                $item->dui = $row['duiPaciente'];
                $item->fechaCreacion = $row['fechaCreacion'];
                $item->ultimaConsulta = "Modificar sentencia SQL";
                $item->fechaNacimiento = $row['fechaNacimiento'];
                $item->edad = $row['edad'];
                $item->tipoSangre = $row['tipoSangre'];
                $item->genero = $row['genero'];
                $item->telefono = $row['telefono'];
                $item->direccion = $row['direccion'];
            }
            $query = null;
            return $item;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    //Para obtener los habitos de la historia clinica
    public function obtenerHabitos($id, $tipo){
        $items = [];
        $query = $this->db->connect()->prepare(
            "SELECT habitos.nombreHabito, habitos.detalleHabito, habitos.tipo AS 'tipoHabito'
            FROM habitos
            WHERE habitos.pacientes_idPacientes = :idPaciente AND habitos.tipo = :tipoHabito ");
        try{
            $query->execute(['idPaciente' => $id, 'tipoHabito' => $tipo]);
            while($row = $query->fetch()){
                $item['nombre'] = $row['nombreHabito'];
                $item['detalle'] = $row['detalleHabito'];
                array_push($items, $item);
            }
            $query = null;
            return $items;
        }catch(PDOException $e){
            $e->getMessage();
            return null;
        }
    }

    public function obtenerEnfermedades($id, $tipo){
        $items = [];
        $query = $this->db->connect()->prepare(
            "SELECT nombreEnfermedad, fechaEnfermedad, detalle AS 'detalleEnfermedad'
            FROM enfermedades
            WHERE enfermedades.pacientes_idPacientes = :idPaciente AND tipoEnfermedad = :tipoEnfermedad");
        try{
            $query->execute(['idPaciente' => $id, 'tipoEnfermedad' => $tipo]);
            while($row = $query->fetch()){
                $item['nombre'] = $row['nombreEnfermedad'];
                $item['fecha'] = date("d-m-Y", strtotime($row['fechaEnfermedad']));
                $item['detalle'] = $row['detalleEnfermedad'];
                array_push($items, $item);
            }
            $query = null;
            return $items;
        }catch(PDOException $e){
            $e->getMessage();
            return null;
        }
    }

    public function obtenerAlergias($id){
        $items = [];
        $query = $this->db->connect()->prepare(
            "SELECT alergias.nombreAlergia
            FROM pacientes_alergias
            INNER JOIN alergias ON pacientes_alergias.alergias_idAlergias = alergias.idAlergias
            WHERE pacientes_idPacientes = :idPaciente");
        try{
            $query->execute(['idPaciente' => $id]);
            while($row = $query->fetch()){
                $item['nombre'] = $row['nombreAlergia'];
                array_push($items, $item);
            }
            $query = null;
            return $items;
        }catch(PDOException $e){
            $e->getMessage();
            return null;
        }
    }

    public function obtenerMedicamentos($id){
        $items = [];
        $query = $this->db->connect()->prepare(
            "SELECT nombreMedicamento, dosis
            FROM medicamentos
            WHERE pacientes_idPacientes = :idPaciente");
        try{
            $query->execute(['idPaciente' => $id]);
            while($row = $query->fetch()){
                $item['nombre'] = $row['nombreMedicamento'];
                $item['dosis'] = $row['dosis'];
                array_push($items, $item);
            }
            $query = null;
            return $items;
        }catch(PDOException $e){
            $e->getMessage();
            return null;
        }
    }


    //Para insertar un nuevo habito a la historia
    public function insertarH($id,$nombre,$detalle,$tipo){
        $items = [];
        $query = $this->db->connect()->prepare(
            "INSERT INTO habitos(idHabitos,nombreHabito,detalleHabito,tipo,pacientes_idPacientes) VALUES (NULL,:nombreH, :detalleH, :tipo, :idPaciente)");

        
        $query->bindValue(':nombreH', $nombre);
        $query->bindValue(':detalleH', $detalle); 
        $query->bindValue(':tipo', $tipo);
        $query->bindValue(':idPaciente', $id);
        $query->execute();        

    }


    
}


?>