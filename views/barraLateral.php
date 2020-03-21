
<!-- Barra lateral de navegación -->
<nav id="barraLateral">
    <div class="sidebar-header">
        <!--En esta parte iba una imágen y el nombre del hospital, pero ha quedado vacio por el momento-->
    </div>

    <ul id="enlacesNavegacion" class="list-unlisted components">
        <li>
            <a href="<?php echo constant('URL');?>login">Inicio</a>
        </li>
        <li class="active">
            <a href="<?php echo constant('URL');?>buscarExpediente">Buscar expediente</a>
        </li>
        <li>
            <a href="<?php echo constant('URL');?>generarExpediente">Generar expediente</a>
        </li>
    </ul>
</nav>