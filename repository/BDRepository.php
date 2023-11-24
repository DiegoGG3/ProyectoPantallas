<?php

    class BDRepository {
        public static function selectUniversal($conexion, $tabla) {
            $resultado = $conexion->query('SELECT * FROM ' . $tabla . ";", MYSQLI_USE_RESULT);
            $objetos = array();
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                array_push($objetos, $registro);
            }
    
            switch ($tabla) {
                case "noticias":
                    return noticiaRepository::arrayNoticia($objetos);
                    break;
            }
        }

        public static function selectUrl($conexion) {
            $resultado = $conexion->query('SELECT url FROM contenido;', MYSQLI_USE_RESULT);
            $objetos = array();
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                array_push($objetos, $registro);
            }
            return $objetos;
        
        }

    }
    
?>