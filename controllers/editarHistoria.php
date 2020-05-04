<?php
    include_once 'models/historialClinico.php';
    class editarHistoria extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->expediente = "";

            $this->view->historialClinico = new HistorialClinico(); 
        }

        function render(){
            $this->view->render('editarHistoria/index');
        }

        function recuperarExpediente($datos){
            $id = $datos[0];
            $this->view->expediente = $this->model->obtenerExpediente($id);

            $this->view->historialClinico->habitosToxicos = $this->model->obtenerHabitos($id, 'HT');
            $this->view->historialClinico->habitosFisiologicos = $this->model->obtenerHabitos($id, 'HF');
            $this->view->historialClinico->enfermedadesInfancia = $this->model->obtenerEnfermedades($id, 'EI');
            $this->view->historialClinico->enfermedades = $this->model->obtenerEnfermedades($id, 'EA');
            $this->view->historialClinico->alergias = $this->model->obtenerAlergias($id);
            $this->view->historialClinico->medicamentos = $this->model->obtenerMedicamentos($id);
            $this->render();
        }
        public function prueba(){ 

            
        }
    

        function insertarHabito(){
            
            
            /*
            $motivoConsulta = $_POST['motivo'];
            $enfermedad = $_POST['enfermedad'];
            $antecedente = $_POST['antecedente'];
            $temperatura = $_POST['temperatura'];
            $presion = $_POST['presion'];
            $pulso = $_POST['pulso'];
            $frecuencia = $_POST['frecuenciac'];
            $diagnostico = $_POST['diagnostico'];
            $orden = $_POST['examenLista'];
            $this->model->guardarConsulta($idPaciente, $motivoConsulta, $enfermedad, $antecedente, $temperatura, $presion, $pulso, $frecuencia, $diagnostico, $orden);*/
            $this->render();

        }
        
    }

?>