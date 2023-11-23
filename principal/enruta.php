

<main>
<div id="cuerpo">

<?php
if (isset($_GET['pantalla'])) {
    if ($_GET['pantalla'] == "vista") {
        require_once './principal/enrutaPerfil.php';
    }
    if ($_GET['pantalla'] == "creaNoticia") {
        require_once './interfaz/creaNoticia.php';
    }
    if ($_GET['pantalla'] == "listaNoticia") {
        require_once './interfaz/listaNoticia.php';
    }
}
?>
</div>
</main>


    
