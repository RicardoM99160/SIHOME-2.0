<?php

    class Admin extends Controller{

        function __construct(){
            parent::__construct();
            
        }

        function render(){
            $this->view->render('admin/index');
        }

        //Funcion para cerrar la sesión del usuario
        function cerrarSesion(){
            echo "Cerrar sesion";
            $this->model->unsetUserSession();
            $this->render();
        }
        
    } 

?>