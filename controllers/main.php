<?php

    class Main extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('main/index');
            echo "<p>Nuevo controlador main</p>";
        }

        function saludo(){
            echo "<p>Ejecutaste el método saludo</p>";
        }
    }

?>