<?php

    class GenerarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('generarExpediente/index');
            //echo "<p>Controlador para Generar Expediente</p>";
        }
        
    }

?>