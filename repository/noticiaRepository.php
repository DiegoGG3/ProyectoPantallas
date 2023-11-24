<?php
    class noticiaRepository{
        public static function crearNoticia($id, $comienzo, $fin, $titulo, $prioridad, $perfil, $duracion, $idContenido) {
            $noticia = new Noticia($id, $comienzo, $fin, $titulo, $prioridad, $perfil, $duracion, $idContenido);
            return $noticia;
        }
        
        public static function arrayNoticia($objetos) {
            $arrayNoticia = array();
            foreach ($objetos as $array) {
                array_push($arrayNoticia, noticiaRepository::crearNoticia(
                    $array->id,
                    $array->comienzo,
                    $array->fin,
                    $array->titulo,
                    $array->prioridad,
                    $array->perfil,
                    $array->duracion,
                    $array->idContenido
                ));
            }
            return $arrayNoticia;
        }
        
        public static function añadirNoticia($conexion, $noticia) {
            $preparedConexion = $conexion->prepare("INSERT INTO noticias(comienzo, fin, titulo, prioridad, perfil, duracion, idContenido)
                VALUES (:comienzo, :fin, :titulo, :prioridad, :perfil, :duracion, :idContenido)");
        
            $comienzo = $noticia->getComienzo();
            $fin = $noticia->getFin();
            $titulo = $noticia->getTitulo();
            $prioridad = $noticia->getPrioridad();
            $perfil = $noticia->getPerfil();
            $duracion = $noticia->getDuracion();
            $idContenido = $noticia->getIdContenido();
        
            $preparedConexion->bindParam(':comienzo', $comienzo);
            $preparedConexion->bindParam(':fin', $fin);
            $preparedConexion->bindParam(':titulo', $titulo);
            $preparedConexion->bindParam(':prioridad', $prioridad);
            $preparedConexion->bindParam(':perfil', $perfil);
            $preparedConexion->bindParam(':duracion', $duracion);
            $preparedConexion->bindParam(':idContenido', $idContenido);
        
            $preparedConexion->execute();
        }
        
        

        public static function borrarNoticia($conexion, $id) {
            $preparedConexion = $conexion->prepare("DELETE FROM noticias WHERE id = :id");
        
            $preparedConexion->bindParam(':id', $id);
        
            $preparedConexion->execute();
        }
        
    }
?>