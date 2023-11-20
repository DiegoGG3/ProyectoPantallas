<?php
    class noticiaRepository{
        public static function crearNoticia($id,$comienzo,$fin,$titulo,$prioridad,$duracion){
            $Noticia=new Noticia($id,$comienzo,$fin,$titulo,$prioridad,$duracion);
            return $Noticia;
        }

        

        public static function arrayNoticia($objetos) {
            $arrayNoticia= array();
            foreach($objetos as $array){
                array_push($arrayNoticia,noticiaRepository::crearNoticia($array->id,$array->comienzo,$array->fin,$array->titulo,$array->prioridad,$array->duracion));
            }
            return $arrayNoticia;
        }

        public static function añadirNoticia($conexion, $noticia) {
            $preparedConexion = $conexion->prepare("INSERT INTO noticias(id, comienzo, fin, titulo, prioridad, duracion)
                VALUES (:id, :comienzo, :fin, :titulo, :prioridad, :duracion)");
        
            $id = $noticia->getId();
            $comienzo = $noticia->getComienzo();
            $fin = $noticia->getFin();
            $titulo = $noticia->getTitulo();
            $prioridad = $noticia->getPrioridad();
            $duracion = $noticia->getDuracion();
        
            $preparedConexion->bindParam(':id', $id);
            $preparedConexion->bindParam(':comienzo', $comienzo);
            $preparedConexion->bindParam(':fin', $fin);
            $preparedConexion->bindParam(':titulo', $titulo);
            $preparedConexion->bindParam(':prioridad', $prioridad);
            $preparedConexion->bindParam(':duracion', $duracion);
        
            $preparedConexion->execute();
        }
        

        public static function borrarNoticia($conexion, $id) {
            $preparedConexion = $conexion->prepare("DELETE FROM Noticia WHERE id = :id");
        
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