<?php

    class generarConsultamodel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function guardarConsulta($idPaciente, $motivoConsulta, $enfermedad, $antecedente, $temperatura, $presion, $pulso, $frecuencia, $diagnostico, $orden){
            var_dump($idPaciente);
            $query = $this->db->connect()->prepare("SELECT COUNT(idConsulta) AS cantidadConsultas FROM consulta");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $queryres = ($query->fetch()); 
            $cantConsulta = $queryres['cantidadConsultas'];

            $nuevoid = 'C'.str_pad(($cantConsulta+1), 5, '0', STR_PAD_LEFT);
            
            $sqlConsulta = "INSERT INTO consulta (idConsulta, motivoConsulta, enfermedadConsulta, antecedentesConsulta, diagnostico, fechaConsulta, horaConsulta, personal_idPersonal, pacientes_idPacientes) 
            VALUES (:idConsulta, :motivoConsulta, :enfermedadconsulta, :antecedentes, :diagnostico, :fecha, :hora, :idEmpleado, :idPaciente)";
            $statement = $this->db->connect()->prepare($sqlConsulta);
            $statement->bindValue(':idConsulta', $nuevoid);
            $statement->bindValue(':motivoConsulta', $motivoConsulta);
            $statement->bindValue(':enfermedadconsulta', $enfermedad);
            $statement->bindValue(':antecedentes', $antecedente);
            $statement->bindValue(':diagnostico', $diagnostico);
            $statement->bindValue(':fecha', date('Y-m-d'));
            $statement->bindValue(':hora', date('H:i'));
            $statement->bindValue(':idEmpleado', $_SESSION['userID']);
            $statement->bindValue(':idPaciente', $idPaciente);
            $statement->execute();
            
            $sqlExFisico = "INSERT INTO examenFisico (idExamen, temperatura, presionCardia, pulso, frecuenciaRespiratoria, consulta_idConsulta) 
            VALUES (NULL, :temperatura, :presion, :pulso, :frecuencia, :idConsulta)";
            $statement2 = $this->db->connect()->prepare($sqlExFisico);
            $statement2->bindValue(':temperatura', $temperatura);
            $statement2->bindValue(':presion', $presion);
            $statement2->bindValue(':pulso', $pulso);
            $statement2->bindValue(':frecuencia', $frecuencia);
            $statement2->bindValue(':idConsulta', $nuevoid);
            $statement2->execute();

            $this->InsertarOrden($nuevoid, $orden);
        }


        public function obtenerDatos($idPaciente){
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
                $_SESSION['datos']=[];
                $query->bindValue(':idPaciente',$idPaciente);
                $query->execute();
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $queryAns = $query->fetchAll();
                //var_dump($this->queryAns);
                $_SESSION['datos'] = $queryAns;
               //var_dump($_SESSION['datos']);
                $query = null;
            }catch(PDOException $e){
                echo $e->getMessage();
                return null;
        }
    }

    function InsertarOrden($nuevoid, $orden){
        var_dump($orden);
        $ordenes = explode(',',$orden);
        $sqlOrden = "INSERT INTO orden (idOrden, nombreOrden, consulta_idConsulta) VALUES (NULL, :detalle, :idConsulta)";
        $query = $this->db->connect()->prepare($sqlOrden);
        foreach($ordenes as $detalle){
            if($detalle != ''){
                $query->bindValue(':detalle',$detalle);
                $query->bindValue(':idConsulta',$nuevoid);
                $query->execute();
            }
            
        }
        

    }
}


?>