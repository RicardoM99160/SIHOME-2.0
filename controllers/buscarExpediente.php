<?php

    class BuscarExpediente extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('buscarExpediente/index');
            //echo "<p>Controlador Buscar Expediente</p>";
        }
        
    } 

?>