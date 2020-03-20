<?php

    class VisualizarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('visualizarExpediente/index');
            //echo "<p>Controlador para Visualizar Expediente</p>";
        }

    }

?>