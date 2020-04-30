<?php

    class VisualizarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Visualizar Expediente</p>";
            $this->view->expediente = "";
            $this->view->consultas = [];
        }

        function render(){
            $this->view->render('visualizarExpediente/index');
        }

        function mostrarExpediente($datos){
            $id = $datos[0];
            $this->view->expediente = $this->model->obtenerExpediente($id);
            $this->view->consultas = $this->model->obtenerConsultas($id);
            //var_dump($this->view->consultas);
            //echo $id;
            $this->render();
        }

    }

?>