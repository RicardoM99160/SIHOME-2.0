<?php
    require_once 'controllers/errores.php';
    class App{
        function __construct(){
            //echo "<p>Nueva app</p>";

            $url = isset($_GET['url']) ? $_GET['url'] : null ;
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            //var_dump($url);

            if(empty($url[0])){
                $archivoController = 'controllers/login.php';
                require_once $archivoController;
                $controller = new Login();
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel('login');
                return false;
            }
            $archivoController = 'controllers/'.$url[0].'.php';

            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller = new $url[0];
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel($url[0]);

                if(isset($url[1]) && method_exists($controller,$url[1])){
                    $controller->{$url[1]}();
                }
            }else{
                $controller = new Errores();
            }
             

        }
    }

?>