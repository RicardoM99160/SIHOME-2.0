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
            if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 0){
                //Primero se evalua si el usuario es de tipo admin, en ese caso solo se le renderiza esa vista
                //Y no tiene acceso a los demás controladores

                $archivoController = 'controllers/admin.php';
                require_once $archivoController;
                //Inicializo el controlador de admin
                $controller = new Admin();
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel('admin');
                $controller->render();
                return false;
            }else{
                if(empty($url[0]) || $url[0]=='login' || $url[0]=='admin'){
                    $archivoController = 'controllers/buscarExpediente.php';
                    require_once $archivoController;
    
                    //Inicializo el controlador de Buscar Expediente
                    $controller = new BuscarExpediente();
                    //Aquí asigno el modelo al controlador llamado
                    $controller->loadModel('buscarExpediente');
                    $controller->render();
                    return false;
                }
            }
            
            

            $archivoController = 'controllers/'.$url[0].'.php';
            if(file_exists($archivoController)){
                require_once $archivoController;

                //Inicializo el controlador
                $controller = new $url[0];
                //Aquí asigno el modelo al controlador llamado
                $controller->loadModel($url[0]);

                //cantidad de elementos del arreglo
                $nparam = sizeof($url);

                //Si hay un método que se require cargar
                if($nparam > 1 && method_exists($controller,$url[1])){
                    //Luego de los métodos se procesan los parámetros que son enviados
                    //al método
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i < $nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        //var_dump($param);
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errores();
            }
             

        }
    }

?>