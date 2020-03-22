<?php

    class loginModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        //Aqui agrego todas las funciones CRUD del modelo loginModel
        public function insert(){
            //inserta datos en la BD
            echo "<p>Insertar datos</p>";
        }
    }

?>