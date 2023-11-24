<?php
require_once "../helper/autocargar.php";

Sesion::iniciar();

if(isset($_SESSION['carrusel']) && $_SESSION['carrusel']==null){
    echo json_encode(funcionesCarrusel::devolverContenido());

}else{
    funcionesCarrusel::cargarCarrusel($_SESSION['user']);
    echo json_encode(funcionesCarrusel::devolverContenido());
}