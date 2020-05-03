<?php
    require_once 'libs/database.php';
    class User{

        private $nombre;
        private $apellido;
        private $username;
        private $cargo;
        private $userID;
        private $sesion;

        function __construct(){
            $this->db = new Database();
        }

        //Esta función sirve para verificar en la base de datos si el usuario existe
        public function userExists($user,$pass){
            $query = $this->db->connect()->prepare(
                "SELECT emailPersonal AS 'user', contrasena AS 'pass'
                FROM personal
                WHERE emailPersonal = :email AND contrasena = :contra");
            $query->execute(['email' => $user, 'contra' => $pass]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }

            $query = null;
        }

        //Revisa si el usuario ha iniciado sesion en otro dispositivo
        //En caso de iniciar sesion en este dispositivo cambia el estado de la sesion de 1 a 0
        public function userInSession($user){
            //El 1 significa que no ha iniciado sesión
            //El 0 significa que ha iniciado sesión
            $query = $this->db->connect()->prepare(
                "SELECT estado
                FROM personal
                WHERE emailPersonal = :email AND estado = '1'");
            $query->execute(['email' => $user]);

            if($query->rowCount()){
                $query = $this->db->connect()->prepare(
                    "UPDATE personal
                    SET estado = '0'
                    WHERE emailPersonal = :email");
                $query->execute(['email' => $user]);
                return true;
            }else{
                return false;
            }
            $query = null;
        }

        public function unblockedUser($user){
            $query = $this->db->connect()->prepare(
                "SELECT habilitado
                FROM personal
                WHERE emailPersonal = :email AND habilitado = '1'");
            $query->execute(['email' => $user]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
            $query = null;
        }

        //Función para obtener todos los datos necesarios del usuario validado de la BD
        public function setUser($user){
            $query = $this->db->connect()->prepare(
                "SELECT *
                FROM personal
                WHERE emailPersonal = :email");
            $query->execute(['email' => $user]);

            foreach($query as $currentUser){
                $this->nombre = $currentUser['nombrePersonal'];
                $this->apellido = $currentUser['apellidoPersonal'];
                $this->username = $currentUser['emailPersonal'];
                $this->cargo = $currentUser['cargo'];
                $this->userID = $currentUser['idPersonal'];
            }

            $query = null;
        }

        public function getNombre(){
            //Sirve para obtener el nombre del usuario que ha ingresado sesión
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function getID(){
            return $this->userID;
        }
    }

?>