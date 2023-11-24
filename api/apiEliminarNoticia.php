<?php
    require_once '../helper/autocargar.php';

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $conexion = DB::abreConexion();

    noticiaRepository::borrarNoticia($conexion,$prueba['idNoticia']);
?>