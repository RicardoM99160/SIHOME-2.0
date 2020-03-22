<?php

    class VisualizarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Visualizar Expediente</p>";
        }

        function render(){
            $this->view->render('visualizarExpediente/index');
        }

    }

?>