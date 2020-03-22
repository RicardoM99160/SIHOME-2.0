<?php

    class Login extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador de Login</p>";
        }

        function render(){
            $this->view->render('login/index');
        }

        function iniciarSesion(){
            echo "<p>Inicio de sesion exitoso</p>";
            $this->model->insert();
            $this->render();
        }

    }

?>