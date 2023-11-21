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

        public static function devolverUsuario($conexion,$nombre,$contraseña){
            $sql= "SELECT * from user where contraseña=:contraseña and nombre=:nombre;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":contraseña",$contraseña);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                return userRep::crearUsuario($registro->IDuser,$registro->nombre,$registro->password,$registro->rol);
            }
        }

        public static function devolverExamen($conexion){
            $sql= "SELECT * FROM Examen WHERE ID = (SELECT MAX(ID) FROM Examen);";
            $statement=$conexion->prepare($sql);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                return examenRepository::crearExamen($registro->ID,$registro->fecha_inicio,$registro->id_creador);
            }
        }

        public static function devolverExamenAlumno($conexion, $idalumno){
            
            $sql= "SELECT IdExamen FROM usuario_tiene_examen WHERE IdUsuario =:IdUsuario ;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":IdUsuario",$idalumno);

            $statement->execute();
            $examenes=array();
            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                array_push($examenes, BDRepository::devolverExamenPorId($conexion, $registro->IdExamen));

            }
            return $examenes;
        }

        public static function devolverExamenPorId($conexion, $id){
            $sql= "SELECT * FROM Examen WHERE ID = :ID;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":ID",$id);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                
                return examenRepository::crearExamen($registro->ID,$registro->fecha_inicio,$registro->id_creador);
            }
        }

        public static function devolverPreguntaPorId($conexion, $id){
            $sql= "SELECT * FROM pregunta WHERE ID_pregunta = :ID;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":ID",$id);
            $statement->execute();
            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                
                return preguntaRepository::crearPregunta($registro->ID_pregunta,$registro->Enunciado,$registro->respuestas, $registro->categoria, $registro->dificultad,"","");
            }
        }

        public static function devolverPreguntas($conexion, $id){
            $sql= "SELECT IdPregunta FROM examen_tiene_pregunta WHERE IdExamen = :ID;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":ID",$id);
            $statement->execute();
            $preguntas= array();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                foreach ($registro as $value) {        
                    array_push($preguntas,BDRepository::devolverPreguntaPorId($conexion,$value));
                }
            }
            return $preguntas;
        }
    }
    
?>