<?php

    include_once 'models/historialClinico.php';

    class VisualizarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Visualizar Expediente</p>";
            $this->view->expediente = "";
            $this->view->consultas = [];
            $this->view->historialClinico = new HistorialClinico();
        }

        function render(){
            $this->view->render('visualizarExpediente/index');
        }

        function mostrarExpediente($datos){
            $id = $datos[0];
            $this->view->expediente = $this->model->obtenerExpediente($id);
            $this->view->consultas = $this->model->obtenerConsultas($id);
            //$this->view->historialClinico = $this->model->obtenerHistorialClinico($id);

            $this->view->historialClinico->habitosToxicos = $this->model->obtenerHabitos($id, 'HT');
            $this->view->historialClinico->habitosFisiologicos = $this->model->obtenerHabitos($id, 'HF');
            $this->view->historialClinico->enfermedadesInfancia = $this->model->obtenerEnfermedades($id, 'EI');
            $this->view->historialClinico->enfermedades = $this->model->obtenerEnfermedades($id, 'EA');
            $this->view->historialClinico->alergias = $this->model->obtenerAlergias($id);
            $this->view->historialClinico->medicamentos = $this->model->obtenerMedicamentos($id);
            //var_dump($this->view->historialClinico);
            //echo $id;
            $this->render();
        }

    }

?>