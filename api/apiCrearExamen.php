<?php
    require_once '../helper/autocargar.php';
    loginRepository::iniciarSesion();

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();
    

    $idPreguntas =  $prueba['idPreguntas'];
    $examen = examenRepository::crearExamen("","",$_SESSION["user"]->get_Id());
    examenRepository::añadirExamen($conexion, $examen);
    $examen=BDRepository::devolverExamen($conexion);
    $examenId=$examen->get_id();
    
    foreach ($idPreguntas as $id) {
        examenRepository::asignarPreguntas($conexion,$examenId,$id);
    }
?>