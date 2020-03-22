<?php
    require_once 'controllers/errores.php';
    class App{
        function __construct(){
            //echo "<p>Nueva app</p>";

            $url = isset($_GET['url']) ? $_GET['url'] : null ;
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            //var_dump($url);

            //Cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController = 'controllers/login.php';
                require_once $archivoController;

                //Inicializo el controlador de Login
                $controller = new Login();
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel('login');
                $controller->render();
                return false;
            }
            $archivoController = 'controllers/'.$url[0].'.php';

            if(file_exists($archivoController)){
                require_once $archivoController;

                //Inicializo el controlador
                $controller = new $url[0];
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel($url[0]);

                //Si hay un método que se require cargar
                if(isset($url[1]) && method_exists($controller,$url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errores();
            }
             

        }
    }

?>