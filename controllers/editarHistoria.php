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
            $_SESSION['idPaciente'] = $id;
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
            $id = $_SESSION['idPaciente'];
            if(isset($_POST['nuevoHT']) && $_POST['nuevoHT'] == "HT"){
                $nombre = $_POST['nombreHT'];
                $detalle = $_POST['detalleHT'];
                $tipo = 'HT';
                $this->model->insertarH($id,$nombre,$detalle,$tipo);

            }
            if(isset($_POST['nuevoHF']) && $_POST['nuevoHF'] == "HF"){
                $nombre = $_POST['nombreHF'];
                $detalle = $_POST['detalleHF'];
                $tipo = 'HF';
                $this->model->insertarH($id,$nombre,$detalle,$tipo);

            }
            if(isset($_POST['nuevoEI']) && $_POST['nuevoEI'] == "EI"){
                $nombre = $_POST['nombreEI'];
                $detalle = $_POST['detalleEI'];
                $fechaEI = date('Y-m-d');
                $tipo = 'EI';
                $this->model->insertarE($id,$nombre,$detalle,$tipo, $fechaEI);

            }
            $this->view->expediente = $this->model->obtenerExpediente($id);

            $this->view->historialClinico->habitosToxicos = $this->model->obtenerHabitos($id, 'HT');
            $this->view->historialClinico->habitosFisiologicos = $this->model->obtenerHabitos($id, 'HF');
            $this->view->historialClinico->enfermedadesInfancia = $this->model->obtenerEnfermedades($id, 'EI');
            $this->view->historialClinico->enfermedades = $this->model->obtenerEnfermedades($id, 'EA');
            $this->view->historialClinico->alergias = $this->model->obtenerAlergias($id);
            $this->view->historialClinico->medicamentos = $this->model->obtenerMedicamentos($id);
            $this->render();
        
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
        }
        
    }

?>