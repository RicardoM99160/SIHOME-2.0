<?php

    class BuscarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            //echo "<p>Controlador Buscar Expediente</p>";
        }

        function render(){
            $this->view->render('buscarExpediente/index');
        }
        
    } 

?>