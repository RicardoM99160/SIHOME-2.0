<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesión</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- CSS propio -->
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/login.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/tiny-swipper-login.css">
    <!--tiny swipper lib-->
    <script src="<?php echo constant('URL')?>public/js/tiny_swipper/index.js"></script> 
    <!--chart lib-->
    <script src="<?php echo constant('URL')?>public/js/chart/chart.js"></script> 
    <script src="<?php echo constant('URL')?>public/js/chart/chart.min.js"></script> 
    <!-- chart.piece.label.js -->
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script> 
    <!--- jquery --->
    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
    
    <script src="<?php echo constant('URL')?>public/js/graficos.js"></script> 
    
    <!--------------------------------------------------------------------------------------------->
</head>
<body>
    <!-- contenedor principal de slides-->
    <div class="swiper-container" id="swiper1">
        <!-- swiper wrapper -->
        <div class="swiper-wrapper">
            <!-- slide de inicio de sesion-->
            <div class="a swiper-slide">
                <!--inicio de sesion--> 
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
                            <div id="datosErroneos" class="pl-2 w-75">
                                <p><?php echo $this->mensaje; ?></p>
                            </div>
                            <form action="" method="POST" id="form-inicioSesion" class="mb-5 pl-4 w-75">
                                <div class="row form-group d-block">
                                    <label for="txtNombreUsuario" class="d-block">Correo institucional</label>
                                    <!-- Ingreso de correo -->
                                    <div class="input-group ">
                                        <div id="form-input-wrap" class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
                                        </div>
                                        <input  type="text" name="usuario" id="txtNombreUsuario" class="w-75 form-control d-block" placeholder="ejemplo@gmail.com" onchange="habilitarInicio()">
                                        <div class="invalid-feedback">Ingrese un correo con formato válido. Ej: ejemplo@gmail.com</div><p></p>
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
                        <button class="btn-action" type="submit" id="btnInicio" disabled="true">Iniciar sesión</button>
                        <button class="btn-ayuda" type="button">Ayuda</button>
                    </div>
                </form>
            </div>
            <div  class="col-lg-5 align-self-center  pull-right"> 
                    <img  src="<?php echo constant('URL');?>public/img/3350444.jpg" alt="Imagen" class="rounded-circle border"> 
            </div>
        </div>
    </div>

            </div>
            <!-- slide de graficos --> 
            <div class="b swiper-slide">       
                <div class="container w-100 h-100 wrapper justify-content-center">
                    <div class="row w-100  align-self-center">
                        <div class="col-lg-12 ">      
                            <div id="font-bienvenida"class="text-left">
                                <h3>ESTADISTICAS DE PACIENTES</h3>
                            </div>      
                            <canvas id="graficoGenero"></canvas> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
     

    <!-- Validaciones -->
    <script type="text/javascript">
        //Validación de correo
        document.getElementById('txtNombreUsuario').addEventListener('blur',function(e){
            var datos = document.getElementById('txtNombreUsuario');
            var re=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if(re.test(datos.value) || datos.value == "")
            {
                //Válido
                datos.classList.remove('is-invalid');
            }
            else
            {
                //Inválido
                datos.classList.add('is-invalid');
            }
            e.preventDefault();
        })

        //Validar botón
        function habilitarInicio()
        {
            var datos = document.getElementById('txtNombreUsuario');
            var re=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if(re.test(datos.value))
            {
                document.getElementById('btnInicio').disabled = false;
            }
            else
            {
                document.getElementById('btnInicio').disabled = true;
            } 
        }
    </script>
    <!-- tiny swipper conf -->
    <script type="text/javascript"> 
        var mySwiper = new Swiper('#swiper1', {
            speed: 500,
            cssMode: true,
            direction: 'vertical',
            spaceBetween: 10,
            mousewheel: true
        });         
    </script> 

    <script type="text/javascript">
        var BASE_URL= "<?php echo constant('URL')?>";
     </script> 
    
</body>
</html>