


<!-- Barra lateral de navegación -->
<nav id="barraLateral">
    <div class="sidebar-header">
        <!--En esta parte iba una imágen y el nombre del hospital, pero ha quedado vacio por el momento-->
    </div>

    <ul id="enlacesNavegacion" class="list-unlisted components">
        <li id="bExp" class="">
            <a href="<?php echo constant('URL');?>buscarExpediente">Buscar expediente</a>
        </li>
        <li id="gExp" class="">
            <a href="<?php echo constant('URL');?>generarExpediente">Generar expediente</a>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    /*
    document.getElementById("bExp").addEventListener("click", buscExp());
    document.getElementById("gExp").addEventListener("click", genExp());

   function buscExp(){
       document.getElementById("bExp").classList.add('active');
       document.getElementById("gExp").classList.remove('active');
   }

   function genExp(){
        document.getElementById("bExp").classList.remove('active');
        document.getElementById("gExp").classList.add('active');
   }*/

   


</script>
