

<main>
<div id="cuerpo">

<?php
if (isset($_GET['pantalla'])) {
    if ($_GET['pantalla'] == "alumno") {
        require_once 'index.php';
    }
    if ($_GET['pantalla'] == "profesor") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['pantalla'] == "profesor") {
        require_once './Vistas/Login/autentifica.php';
    }
}
?>
</div>
</main>


    
