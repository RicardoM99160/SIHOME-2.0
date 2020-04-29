<?php

    require_once 'libs/user.php';
    require_once 'libs/user_session.php';
    require_once 'libs/database.php';
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';

    require_once 'config/config.php';
    
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

    if(isset($_SESSION['user'])){
        $user->setUser($userSession->getCurrentUser());
        $app = new App(); 
    }else if(isset($_POST['usuario']) && isset($_POST['pass'])){

        $userForm = $_POST['usuario'];
        $passForm = $_POST['pass'];

        if($user->userExists($userForm, $passForm)){
            $user->setUser($userForm);
            $userSession->setCurrentUser($userForm, $user->getNombre(), $user->getApellido());
            $controladorBE->render();
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
    
?>