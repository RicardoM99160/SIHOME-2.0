<?php

    class GenerarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Generar Expediente</p>";
        }

        function render(){
            $this->view->render('generarExpediente/index');
        }
        
    }

?>