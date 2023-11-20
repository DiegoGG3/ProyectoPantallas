<?php

require_once '../helper/autocargar.php';
    loginRepository::iniciarSesion();

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();

    $preguntas=BDRepository::devolverPreguntas($conexion,$prueba['idExamen']);
    echo json_encode($preguntas);

?>