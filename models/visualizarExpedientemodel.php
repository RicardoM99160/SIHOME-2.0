<?php

    include_once 'models/expediente.php';
    include_once 'models/consulta.php';

    class visualizarExpedienteModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //Para buscar un solo expediente
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

        public function obtenerConsultas($id){
            $items = [];
            $query = $this->db->connect()->prepare(
                "SELECT consulta.idConsulta, consulta.motivoConsulta, consulta.enfermedadConsulta, consulta.antecedentesConsulta, 
                consulta.diagnostico, personal.nombrePersonal AS 'nombreDoctor', personal.apellidoPersonal AS 'apellidoDoctor' 
                FROM consulta 
                INNER JOIN personal ON consulta.personal_idPersonal = personal.idPersonal
                WHERE consulta.pacientes_idPacientes = :idPaciente");
            try{
                $query->execute(['idPaciente' => $id]);

                while($row = $query->fetch()){
                    $item = new Consulta();
                    $item->codigo = $row['idConsulta'];
                    $item->motivo = $row['motivoConsulta'];
                    $item->enfermedad = $row['enfermedadConsulta'];
                    $item->antecedentes = $row['antecedentesConsulta'];
                    $item->diagnostico = $row['diagnostico'];
                    $item->doctorEncargado = $row['nombreDoctor'] . " " . $row['apellidoDoctor'];
                    $item->fecha = "Agregar a tabla de consultas";
                    $item->hora = "Agregar a tabla de consultas";
                    array_push($items, $item);
                }
                $query = null;
                return $items;
            }catch(PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }
    }

?>