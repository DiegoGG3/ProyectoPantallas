<?php
    require_once '../helper/autocargar.php';

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();
    noticiaRepository::borrarNoticia($conexion,$prueba['idNoticia']);
?>