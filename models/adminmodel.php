<?php

    class adminModel extends Model{

        public function __construct(){
            parent::__construct();
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