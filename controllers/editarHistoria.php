<?php
    
    class editarHistoria extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->expediente = "";
            //echo "<p>Controlador para Generar Expediente</p>";
        }

        function render(){
            $this->view->render('editarHistoria/index');
        }

        function recuperarExpediente($datos){
            $id = $datos[0];
            $this->view->expediente = $this->model->obtenerExpediente($id);
            
            $this->render();
        }
        
    }

?>