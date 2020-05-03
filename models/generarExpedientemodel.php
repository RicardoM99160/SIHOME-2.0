<?php

    class generarExpedientemodel extends Model{

        public function __construct(){
            parent::__construct();
            
        }

        public function guardarExpediente($nombreP, $apellidoP, $dui, $fechaN, $sexoId, $tipoSangre, $direccionP, $deptoId, $telefonoP,
        $nombrePariente, $apellidoPariente, $direccion, $telefono, $parentezco){

            $query = $this->db->connect()->prepare("SELECT COUNT(idPacientes) AS cantidadPacientes FROM pacientes");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $queryres = ($query->fetch()); 
            $cantUsusarios = $queryres['cantidadPacientes'];

            $nuevoid = 'P'.str_pad(($cantUsusarios+1), 7, '0', STR_PAD_LEFT);
            $fecha = date('Y-m-d');
            $fechaActual = new Datetime($fecha);
            $fechaNacimiento = new DateTime($fechaN);
            $edad = $fechaActual->diff($fechaNacimiento)->format('%y');

            try{
            $sqlPaciente = "INSERT INTO pacientes (idPacientes, nombrePaciente, apellidoPaciente, duiPaciente, fechaNacimiento, fechaCreacion, edad, idTipoSangre, idGenero) 
            VALUES (:idPaciente, :nombreP, :apellidoP, :dui, :fechaNacimiento, :fechaCreacion, :edad, :tipoSangre, :idGenero)";
            $statement = $this->db->connect()->prepare($sqlPaciente);
            $statement->bindValue(':idPaciente', $nuevoid);
            $statement->bindValue(':nombreP', $nombreP);
            $statement->bindValue(':apellidoP', $apellidoP);
            $statement->bindValue(':dui', $dui);
            $statement->bindValue(':fechaNacimiento', $fechaN);
            $statement->bindValue(':fechaCreacion', $fecha);
            $statement->bindValue(':edad', $edad);
            $statement->bindValue(':tipoSangre', $tipoSangre);
            $statement->bindValue(':idGenero', $sexoId);
            $statement->execute();

            $sqlPacTel = "INSERT INTO telefonosPaciente (idTelefono, numeroTelefono, pacientes_idPacientes) VALUES (NULL, :telefono, :idPaciente)";
            $statementTel = $this->db->connect()->prepare($sqlPacTel);
            $statementTel->bindValue(':telefono', $telefonoP);
            $statementTel->bindValue(':idPaciente', $nuevoid);
            $statementTel->execute();

            $sqlPacDir = "INSERT INTO direcciones (idDireccion, direccion, departamento_idDepartamento, pacientes_idPacientes) VALUES (NULL, :direccion, :idDepto, :idPaciente)";
            $statementDir = $this->db->connect()->prepare($sqlPacDir);
            $statementDir->bindValue(':direccion', $direccionP);
            $statementDir->bindValue(':idDepto', $deptoId);
            $statementDir->bindValue(':idPaciente', $nuevoid);
            $statementDir->execute();
            

            $sqlPariente = "INSERT INTO pariente (paciente_idPaciente, nombrePariente, apellidoPariente, direccionPariente, telefonoPariente, parentezco) VALUES (:idPaciente, :nombre, :apellido , :direccion , :telefono , :parentezco)";
            $statementPariente = $this->db->connect()->prepare($sqlPariente);
            $statementPariente->bindValue(':idPaciente', $nuevoid); 
            $statementPariente->bindValue(':nombre', $nombrePariente);
            $statementPariente->bindValue(':apellido', $apellidoPariente);
            $statementPariente->bindValue(':direccion', $direccion);
            $statementPariente->bindValue(':telefono', $telefono);
            $statementPariente->bindValue(':parentezco', $parentezco);
            $statementPariente->execute();
            $this->exp=$nuevoid;
            }
            catch(PDOException $e){
                $this->exp='';
            }

            return $this->exp;
        }
    }


?>