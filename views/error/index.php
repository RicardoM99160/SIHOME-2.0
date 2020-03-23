<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/mensajeError.css">
    <?php require 'views/plantillaBase.php'; ?>
    <div class="wrapper"> 
        <div class="contenido row justify-content-center" >  
            <div class="col-md-4"> 
            <div class="card border-danger mb-3 text-center"> 
                <div class="card-body "> 
                        <p><i class="fas fa-unlink fa-2x text-danger"></i></p>
                        <p class="card-text text-danger"><?php echo $this->mensaje;?></p>
                        <a class="btn btn-danger" href="<?php echo constant('URL')?>buscarExpediente">Regresar a inicio</a>
                </div> 
            </div>
            </div>
        </div> 
    </div>
    
</body>
</html>