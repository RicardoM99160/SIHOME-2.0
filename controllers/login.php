<?php

    class Login extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('login/index');
            //echo "<p>Controlador de Login</p>";
        }

        function iniciarSesion(){
            echo "<p>Inicio de sesion exitoso</p>";
            $this->model->insert();
        }

    }

?>