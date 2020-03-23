<?php

    require_once 'libs/user.php';
    require_once 'libs/user_session.php';
    require_once 'libs/database.php';
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';

    require_once 'config/config.php';
    
    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user'])){
        $user->setUser($userSession->getCurrentUser());
        $app = new App(); 
    }else if(isset($_POST['usuario']) && isset($_POST['pass'])){

        $userForm = $_POST['usuario'];
        $passForm = $_POST['pass'];

        if($user->userExists($userForm, $passForm)){
            $user->setUser($userForm);
            $userSession->setCurrentUser($userForm, $user->getNombre(), $user->getApellido());

            include_once 'views/buscarExpediente/index.php';
        }else{
            include_once 'views/login/index.php';
        }
    }else{
        include_once 'views/login/index.php';
    }
    
?>