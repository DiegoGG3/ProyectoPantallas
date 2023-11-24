<?php
require_once "../helper/autocargar.php";

Sesion::iniciar();

if(isset($_SESSION['carrusel']) && $_SESSION['carrusel']==null){
    echo json_encode(funcionesCarrusel::)
}