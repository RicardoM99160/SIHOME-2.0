<?php

    class GenerarConsulta extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Generar Expediente</p>";
        }

        function render(){
            $this->view->render('generarConsulta/index');
        }
        
    }

?>