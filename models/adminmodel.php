<?php

    include_once 'models/usuario.php';
    class adminModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function obtenerUsuarios(){
            $items = [];
            $query = $this->db->connect()->prepare(
                "SELECT *
                FROM personal 
                ");
            try{
                $query->execute();
                $_SESSION['cantidadUsuarios'] = $query->rowCount();
                while($row = $query->fetch()){
                    $item = new Usuario();
                    $item->codigo = $row['idPersonal'];
                    $item->nombre = $row['nombrePersonal'];
                    $item->apellido = $row['apellidoPersonal'];
                    $item->cargo = $row['cargo'];
                    $item->estado = $row['estado'];
                    $item->email = $row['emailPersonal'];
                    $item->pass = $row['contrasena'];
                    $item->habilitado = $row['habilitado'];
                    array_push($items, $item);
                    array_push($_SESSION['usuarios'], $item);
                }
                $query = null;
                return $items;
            }catch(PDOException $e){
                $e->getMessage();
                return null;
            }
        }

        public function actualizarContra($id, $pass){
            $query = $this->db->connect()->prepare(
                "UPDATE personal
                SET contrasena = :pass
                WHERE idPersonal = :idPersonal");
            $query->execute(['idPersonal' => $id, 'pass' => $pass]);
            $query = null;
        }

        public function actualizarHabilitarUsuario($id, $estado){
            $query = $this->db->connect()->prepare(
                "UPDATE personal
                SET habilitado = :habilitado
                WHERE idPersonal = :idPersonal");
            $query->execute(['idPersonal' => $id, 'habilitado' => $estado]);
            $query = null;
        }

        public function agregarUsuario($datos){
            $query = $this->db->connect()->prepare(
                "INSERT INTO personal(idPersonal, nombrePersonal, apellidoPersonal, cargo, estado, habilitado, emailPersonal, 
                contrasena, hospitales_idHospital) 
                VALUES (:id, :nombre, :apellido, :cargo, 1, 1, :email, :contra, 3)");
            try{
                $query->execute(["id" => $datos[0], "nombre" => $datos[1], "apellido" => $datos[2], "cargo" => $datos[3], "email" => $datos[4], "contra" => $datos[5]]);
                return true;
            }catch(PDOException $e){
                $e->getMessage();
                return false;
            }
            $query = null;
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