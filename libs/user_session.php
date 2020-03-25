<?php

    class UserSession{

        public function __construct(){
            session_start();
        }

        public function setCurrentUser($user,$nombre,$apellido){
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['idPaciente'] = '';
            $_SESSION['pacientes'] = array();
            $_SESSION['consultas'] = array();
        }

        public function getCurrentUser(){
            return $_SESSION['user'];
        }

        public function closeSession(){
            session_unset();
            session_destroy();
        }
    }

?>