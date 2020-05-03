<?php

    require_once 'libs/user.php';
    require_once 'libs/user_session.php';
    require_once 'libs/database.php';
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';

    require_once 'config/config.php';

    $url = isset($_GET['url']) ? $_GET['url'] : null ;
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if($url[0]=='api'){
        $controladorApi = 'controllers/api.php';
        require_once $controladorApi;
        $controladorApi = new Api();
        $controladorApi->render();
        return false;
    }
    else{
    
    //Inicializando usuario para la sesion
    $userSession = new UserSession();
    $user = new User();

    //Inicializo el controlador de Login
    $controladorLogin = 'controllers/login.php';
    require_once $controladorLogin;
    $controladorLogin = new Login();

    //Inicializando controlador de Buscar Expediente
    $controladorBE = 'controllers/buscarExpediente.php';
    require_once $controladorBE;
    $controladorBE = new BuscarExpediente();

    //Inicializando controlador de admin
    $controladorA = 'controllers/admin.php';
    require_once $controladorA;
    $controladorA = new Admin();

    if(isset($_SESSION['user'])){
        $user->setUser($userSession->getCurrentUser());
        $app = new App(); 
    }else if(isset($_POST['usuario']) && isset($_POST['pass'])){

        $userForm = $_POST['usuario'];
        $passForm = $_POST['pass'];

        if($user->userExists($userForm, $passForm)){
            if($user->unblockedUser($userForm)){
                if($user->userInSession($userForm)){
                    $user->setUser($userForm);
                    $userSession->setCurrentUser($userForm, $user->getNombre(), $user->getApellido(), $user->getCargo());
                    if($_SESSION['cargo'] == 0){
                        $controladorA->loadModel('admin');
                        $controladorA->mostrarUsuarios();
                        //$controladorA->render();
                    }else{
                        $controladorBE->render();
                    }
                }else{
                    //Renderizando la vista de login en caso que el usuario haya iniciado sesión en otra computadora
                    $controladorLogin->view->mensaje="Este usuario tiene una sesión activa en otro dispositivo";
                    $controladorLogin->render();
                }
            }else{
                //Renderizando la vista de login en caso que el usuario haya sido bloqueado
                $controladorLogin->view->mensaje="Este usuario ha sido bloqueado, por favor contactese con el administrador del sitio";
                $controladorLogin->render();
            }
        }else{
            //Renderizando la vista de login con mensaje de error de inicio de sesión
            $controladorLogin->view->mensaje="Usuario y/o contraseña incorrectos";
            $controladorLogin->render();
        }
    }else{
        //Renderizando la vista de login sin mensaje de error de inicio de sesión
        $controladorLogin->view->mensaje="";
        $controladorLogin->render();
    }
}
    
?>