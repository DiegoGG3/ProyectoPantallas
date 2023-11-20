<?php
    require_once '../helper/autocargar.php';

    $datos=file_get_contents('php://input');
    $prueba= json_decode($datos, true);

    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();
 
    $pregunta =  $prueba['preguntaData'];
    

    $preguntaF=preguntaRepository::crearPregunta("",$pregunta["Enunciado"],$pregunta["Respuestas"],$pregunta["Categoria"],$pregunta["Dificultad"],"");
    
    preguntaRepository::añadirPregunta($conexion,$preguntaF);


?>