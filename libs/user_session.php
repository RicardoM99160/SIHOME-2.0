<?php

    class UserSession{

        public function __construct(){
            //header('Cache-Control: no cache');
            //session_cache_limiter('private_no_expire');
            session_start();
        }

        public function setCurrentUser($user,$nombre,$apellido){
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            /*$_SESSION['idPaciente'] = '';
            $_SESSION['pacientes'] = array();
            $_SESSION['consultas'] = array();*/
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