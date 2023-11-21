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
        

        // public static function modificarNombre($conexion, $usuario, $nuevoNombre){
        //     $preparedConexion = $conexion->prepare("UPDATE User SET Nombre = :nuevoNombre WHERE Nombre = :nombre AND contraseña = :contraseña");
        
        //     $nombre = $usuario->get_nombre();
        //     $contraseña = $usuario->get_contraseña();
        
        //     $preparedConexion->bindParam(':nombre', $nombre);
        //     $preparedConexion->bindParam(':contraseña', $contraseña);
        //     $preparedConexion->bindParam(':nuevoNombre', $nuevoNombre);
        
        //     $preparedConexion->execute();
        // }
        
        // public static function modificarcontraseña($conexion, $usuario, $nuevocontraseña){
        //     $preparedConexion = $conexion->prepare("UPDATE User SET contraseña = :nuevocontraseña WHERE Nombre = :nombre AND contraseña = :contraseña");
        
        //     $nombre = $usuario->get_nombre();
        //     $contraseña = $usuario->get_contraseña();
        
        //     $preparedConexion->bindParam(':nombre', $nombre);
        //     $preparedConexion->bindParam(':contraseña', $contraseña);
        //     $preparedConexion->bindParam(':nuevocontraseña', $nuevocontraseña);
        
        //     $preparedConexion->execute();
        // }
        
        // public static function modificarRol($conexion, $usuario, $nuevoRol){
        //     $preparedConexion = $conexion->prepare("UPDATE User SET Role = :nuevoRol WHERE Nombre = :nombre AND contraseña = :contraseña");
        
        //     $nombre = $usuario->get_nombre();
        //     $contraseña = $usuario->get_contraseña();
        
        //     $preparedConexion->bindParam(':nombre', $nombre);
        //     $preparedConexion->bindParam(':contraseña', $contraseña);
        //     $preparedConexion->bindParam(':nuevoRol', $nuevoRol);
        
        //     $preparedConexion->execute();
        // }
        
        
        
    }
?>