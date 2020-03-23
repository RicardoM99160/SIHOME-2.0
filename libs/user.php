<?php

    class User{

        private $nombre;
        private $username;

        public function userExists($user,$pass){
            //Esta función sirve para verificar en la base de datos si el usuario existe
            if($user=="ricardo.majano@sihome.com" && $pass=="123456"){
                return true;
            }else{
                return false;
            }
        }

        public function setUser($user){
            //Esta función sirve para asignar el nombre y el username de acuerdo 
            //al user que se ha pasado como parámetro

            //Esta info se obtiene de la base de datos (Ver el tutorial para configurar bien el login con la bd)
            $this->nombre = "Ricardo";
            $this->apellido = "Majano";
            $this->username = "ricardo.majano@sihome.com";
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