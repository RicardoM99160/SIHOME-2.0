<?php
    include_once 'models/consulta.php';
    include_once 'models/usuario.php';
    class UserSession{

        public function __construct(){
            //header('Cache-Control: no cache');
            //session_cache_limiter('private_no_expire');
            session_start();
        }

        public function setCurrentUser($user,$nombre,$apellido,$cargo, $userID){
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['cargo'] = $cargo;
            $_SESSION['userID']=$userID;
            $_SESSION['consultas'] =array();
            $_SESSION['datos'] = array();
            $_SESSION['idPaciente'] = '';
            $_SESSION['usuarios'] = array();
            $_SESSION['adminC'] ="";
            $_SESSION['cantidadUsuarios'] = 0;
            //$_SESSION['pacientes'] = array();
            //$_SESSION['consultas'] = array();
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