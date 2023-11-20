<?php
    require_once '../helper/autocargar.php';

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();
    
    $usuario = userPendientesRepository::devolverId($conexion, $prueba['idUser']);
    $usuario->set_IdPendiente($prueba['idUser']);

    userPendientesRepository::borrarUsuario($conexion, $usuario);
?>