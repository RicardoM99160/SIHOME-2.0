<?php

    class GenerarConsulta extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Generar Expediente</p>";
        }

        function render(){
            $this->view->render('generarConsulta/index');
        }

        function cargarInfo($id){
            $this->model->obtenerDatos($id[0]);
            $this->render();
        }

        function generarC(){
            if(isset($_POST['submit']) && $_POST['submit'] == "Guardar"){
                $idPaciente = $_SESSION['datos'][0]['idPacientes'];
                $motivoConsulta = $_POST['motivo'];
                $enfermedad = $_POST['enfermedad'];
                $antecedente = $_POST['antecedente'];
                $temperatura = $_POST['temperatura'];
                $presion = $_POST['presion'];
                $pulso = $_POST['pulso'];
                $frecuencia = $_POST['frecuenciac'];
                $diagnostico = $_POST['diagnostico'];
                $orden = $_POST['examenLista'];
                $this->model->guardarConsulta($idPaciente, $motivoConsulta, $enfermedad, $antecedente, $temperatura, $presion, $pulso, $frecuencia, $diagnostico, $orden);
            }
            $this->render();
        }
        
    }

?>