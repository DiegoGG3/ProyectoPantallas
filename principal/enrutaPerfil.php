<?php


if(isset($_GET['user'])){
    if ($_GET['user'] == "profesor"){
        Sesion::logIn("profesor");
    }
    if ($_GET['user'] == "alumno"){
        Sesion::logIn("alumno");
    }
    require_once "pantalla.php";
}

?>