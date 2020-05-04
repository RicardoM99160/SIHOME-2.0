<?php

    class GenerarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador para Generar Expediente</p>";
        }

        function render(){
            $this->view->render('generarExpediente/index');
        }
        
        function generarE(){
            if(isset($_POST['submit']) && $_POST['submit'] == "Guardar"){

            
            $nombrePaciente = $_POST['nombre'];
            $apellidoPaciente = $_POST['apellido'];
            $duiPaciente = $_POST['dui'];
            $nacimientoPaciente = $_POST['nacimiento'];
            $sexoPaciente = $_POST['sexo'];
            $sangrePaciente = $_POST['sangre'];

            $direccionPaciente = $_POST['direccion'];
            $departamentoPaciente = $_POST['departamento'];
            $telefonoPaciente = $_POST['telefono'];

            $nombrePariente = $_POST['nombrep'];
            $apellidoPariente = $_POST['apellidop'];
            $direccionPariente = $_POST['direccionp'];
            $telefonoPariente = $_POST['telefonop'];
            $parentescoPariente = $_POST['parentezcop'];
            
            $this->view->exp = $this->model->guardarExpediente($nombrePaciente, $apellidoPaciente, $duiPaciente, $nacimientoPaciente, $sexoPaciente, $sangrePaciente,$direccionPaciente,$departamentoPaciente,$telefonoPaciente,$nombrePariente,$apellidoPariente,$direccionPariente,$telefonoPariente,$parentescoPariente);
            }
            $this->render();
        }
    }

?>