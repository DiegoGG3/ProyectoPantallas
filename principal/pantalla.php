<?php

$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();
verNoticia::cargarDiv();
$data = BDRepository::selectUrl($conexion);
// Devolver la respuesta como JSON
echo json_encode($data);

?>