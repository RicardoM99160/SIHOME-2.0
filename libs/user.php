<?php

    class User{

        private $nombre;
        private $username;
        private $usuarios;

        function __construct(){
            $this->usuarios = array(
                "ricardo.majano@sihome.com" => array("123456","Ricardo","Majano"),
                "nathaly.palencia@sihome.com" => array("sihome","Nathaly","Palencia"),
                "oscar.serpas@sihome.com" => array("tael98","Oscar","Serpas"),
                "gerardo.moreno@sihome.com" => array("peluca","Gerardo","Moreno")
            );
            $this->loggeado = false;
        }

        public function userExists($user,$pass){
            //Esta función sirve para verificar en la base de datos si el usuario existe
            foreach ($this->usuarios as $usuario => $datos) {
                if($usuario==$user && $datos[0]==$pass){
                    $this->loggeado = true;
                    break;
                }else{
                    $this->loggeado = false;
                }    
            }
            return $this->loggeado;

            /*if($user=="ricardo.majano@sihome.com" && $pass=="123456"){
                return true;
            }else{
                return false;
            }*/
        }

        public function setUser($user){
            //Esta función sirve para asignar el nombre y el username de acuerdo 
            //al user que se ha pasado como parámetro
            //Esta info se obtiene de la base de datos (Ver el tutorial para configurar bien el login con la bd)

            $this->nombre = $this->usuarios[$user][1];
            $this->apellido = $this->usuarios[$user][2];
            $this->username = $user;
        }

        public function getNombre(){
            //Sirve para obtener el nombre del usuario que ha ingresado sesión
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }
    }

?>