<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'views/plantillaBase.php'; ?>
    <div class="wrapper">
        <?php require 'views/barraLateral.php'; ?>
        <h1 style="color: red;"><?php echo $this->mensaje;?></h1>
    </div>
    
</body>
</html>