<?php

    class Admin extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->usuarios = "";
            $this->view->mensaje = "";
            $this->view->nuevoid = "";
            //echo "soy admin";
        }

        function render($vista = null){
            if($vista == null){
                $this->view->render('admin/index');
            }else{
                $this->view->render($vista);
            }
            
        }

        function mostrarUsuarios(){
            /*if(empty($_SESSION['usuarios'])){
                $this->view->usuarios = $this->model->obtenerUsuarios();
            }else{
                $this->view->usuarios = $_SESSION['usuarios'];
            }*/
            $this->view->usuarios = $this->model->obtenerUsuarios();
            $this->render();
        }

        function cambiarContra($datos){
            $id = $datos[0];
            $pass = $datos[1];
            $this->model->actualizarContra($id, $pass);
            /*if(isset($_POST['password']) && isset($_POST['confirmar']) && $_POST['password'] != null && $_POST['confirmar'] != null && $_POST['password'] == $_POST['confirmar']){
                $this->model->actualizarContra($id, $_POST['password']);
                $this->view->mensaje = "Actualización de contraseña exitosa para usuario " . $codigo;
            }*/
            
        }

        function habilitarUsuario($datos){
            $id = $datos[0];
            $estado = $datos[1]; 
            $this->model->actualizarHabilitarUsuario($id, $estado);
        }

        function crearUsuario($datos = null){
            if($datos == null){
                $this->view->nuevoid = 'E'.str_pad(($_SESSION['cantidadUsuarios']+1), 6, '0', STR_PAD_LEFT);
                $this->render('admin/crearUsuario');
            }else{
                $codigo = $_POST['codigo'];
                $nombres = $_POST['nombre'];
                $apellidos = $_POST['apellido'];
                $email = $_POST['correo'];
                $pass = $_POST['pass'];
                $cargo = $_POST['cargo'];
                echo "el cargo seleccionado es " . $cargo;
                if($this->model->agregarUsuario([$codigo, $nombres, $apellidos, $cargo, $email, $pass])){
                    $this->view->mensaje = "Usuario agregado con éxito";
                }else{
                    $this->view->mensaje = "Algo ha ocurrido mal, el usuario no ha sido agregado";
                }
                $_SESSION['cantidadUsuarios']++;
                $this->view->nuevoid = 'P'.str_pad(($_SESSION['cantidadUsuarios']+1), 6, '0', STR_PAD_LEFT);
                $this->render('admin/crearUsuario');
            }
            
        }

        //Funcion para cerrar la sesión del usuario
        function cerrarSesion(){
            $this->model->unsetUserSession();
            $this->render();
        }
        
    } 

?>