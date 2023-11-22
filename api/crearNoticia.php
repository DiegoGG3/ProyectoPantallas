<?php
    require_once '../helper/autocargar.php';

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();

?>