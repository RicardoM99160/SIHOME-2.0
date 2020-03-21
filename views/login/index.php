<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesión</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- CSS propio -->
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="container w-100 h-100 wrapper justify-content-center">
        <div class="row w-75 align-self-center mr-auto">
            <div class="col-lg-7 ">
                <div id="font-icono" class="row">
                    <svg id="i-photo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30" height="30" fill="none" stroke="#0084E6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M20 24 L12 16 2 26 2 2 30 2 30 24 M16 20 L22 14 30 22 30 30 2 30 2 24" />
                        <circle cx="10" cy="9" r="3" />
                    </svg>
                    <h3>SIHOME</h3>
                </div>
                <div id="font-bienvenida"class="row mt-3 mb-4">
                    <h1>Bienvenido a su página de usuario.</h1>
                </div> 
                <form action="" id="form-inicioSesion" class="mb-5 pl-4 w-75">
                    <div class="row form-group d-block">
                        <label for="txtNombreUsuario" class="d-block">Correo institucional</label>
                        <div class="input-group ">
                            <div id="form-input-wrap" class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
                            </div>
                            <input  type="text" name="nombre" id="txtNombreUsuario" class="w-75 form-control d-block" placeholder="ejemplo@gmail.com">
                        </div>
                    </div>
                    
                    <div class="row form-group d-block">
                        <label for="passUsuario" class="d-block">Contraseña</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                            </div>
                            <input type="password" name="pass" id="passUsuario" class="w-75 form-control d-block"  >
                        </div>
                    </div>
                    <div id="btn-form-cont" class="row form-group">
                        <button class="btn-action" type="submit">Iniciar sesión</button>
                        <button class="btn-ayuda" type="menu">Ayuda</button>
                    </div>
                </form>
            </div>
            <div  class="col-lg-5 align-self-center  pull-right"> 
                    <img  src="public/img/3350444.jpg" alt="Imagen" class="rounded-circle border"> 
            </div>
        </div>
    </div>
</body>
</html>