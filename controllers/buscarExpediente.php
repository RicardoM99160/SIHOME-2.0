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
            $this->view->expedientes = $this->model->buscar(['expediente'=>$filtro]);
            //var_dump($this->view->expedientes);

            if(count($this->view->expedientes)>0){
                $mensaje = "Paciente encontrado";
            }else{
                $mensaje = "No se han encontrado pacientes";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    } 

?>