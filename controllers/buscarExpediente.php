<?php
    class BuscarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->expedientes = [];
            $this->view->mensaje = "No se han encontrado pacientes";
            //echo "<p>Controlador Buscar Expediente</p>";
        }

        function render(){
            $this->view->render('buscarExpediente/index');
        }
        
        function buscarE(){
            $filtro = $_POST['filtro'];
            $this->view->expedientes = $this->model->buscar(['paciente'=>$filtro]);
            //var_dump($this->view->expedientes);

            if(count($this->view->expedientes)>0){
                $mensaje = "Paciente encontrado";
            }else{
                $mensaje = "No se han encontrado pacientes";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }

        function buscarF(){
            if(isset($_POST['filtros']))
        {
            $rango = $_POST['edad'];

            if(isset($_POST['antiguedad'])) $orden = $_POST['antiguedad'];
            else $orden = null;
            if(isset($_POST['fecha1'])) $fecha1 = $_POST['fecha1'];
            else $fecha1 = null;
            if(isset($_POST['fecha2'])) $fecha2 = $_POST['fecha2'];
            else $fecha2 = null;
            if(isset($_POST['filtrarEdades'])) $filtrarEdad = $_POST['filtrarEdades'];
            else $filtrarEdad = null;
            if(isset($_POST['filtro'])) $filtro = $_POST['filtro'];
            else $filtro = '';
            //$filtro = $_POST['filtro'];
            

            //Obtener edades por separado
            $edades = explode(",", $rango);
            $edad1 = $edades[0];
            $edad2 = $edades[1];

            $this->view->expedientes = $this->model->filtrar($filtro, $orden, $fecha1, $fecha2, $filtrarEdad, $edad1, $edad2);
            if(count($this->view->expedientes)>0){
                $mensaje = "Paciente encontrado";
            }else{
                $mensaje = "No se han encontrado pacientes";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }
        }

        //Funcion para cerrar la sesión del usuario
        function cerrarSesion(){
            echo "Cerrar sesion";
            $this->model->unsetUserSession();
            $this->render();
        }
    } 

?>