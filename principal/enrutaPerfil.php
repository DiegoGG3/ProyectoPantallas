<?php


if(isset($_GET['user'])){
    if ($_GET['user'] == "profesor"){
        Sesion::logIn("profesor");
        Sesion::escribir("carrusel",null);
    }
    if ($_GET['user'] == "alumno"){
        Sesion::logIn("alumno");
        Sesion::escribir("carrusel",null);

    }
    require_once "pantalla.php";
}

?>