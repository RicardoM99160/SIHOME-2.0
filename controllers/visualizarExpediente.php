<?php

    include_once 'models/historialClinico.php';
    include_once 'models/consulta.php';

    class VisualizarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Visualizar Expediente</p>";
            $this->view->expediente = "";
            $this->view->consultas = [];
            $this->view->consulta = "";
            $this->view->historialClinico = new HistorialClinico();
        }

        function render($vista = null){
            if($vista == null){
                $this->view->render('visualizarExpediente/index');
            }else{
                $this->view->render($vista);
            }
            
        }

        function mostrarExpediente($datos = null){
            $id = $datos[0];
            $_SESSION['idPaciente'] = $id;
            //var_dump($_SESSION['userID']);
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

        function mostrarConsulta($datos = null){
            if($datos == null){
                $this->render('visualizarExpediente/vistaConsulta');
            }else{
                $idC = $datos[0];

                //foreach que recorra la variable de sesion y obtenga la consulta por medio del $idC
                foreach($_SESSION['consultas'] as $consulta){
                    if($consulta->codigo == $idC){
                        $this->view->consulta = $consulta;
                        break;
                    }
                }
                $this->view->consulta->ordenes = $this->model->obtenerOrdenesConsulta($idC);
                //var_dump($this->view->consulta);

                $this->render('visualizarExpediente/vistaConsulta');
            }
        }

    }

?>