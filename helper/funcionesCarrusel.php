<?php
    class funcionesCarrusel{
        public static function cargaCarrusel($rol){
            $db = new DB();
            $db->abreConexion();
            $conexion = $db->getConexion();  

            $matriz=DBRepository::selectUniversal($conexion, 'noticias')
        }

        public static function devolverContenido(){
            $db = new DB();
            $db->abreConexion();
            $conexion = $db->getConexion();    
            
            $contenido=contenidoRepository::devolverUrlContenidoPorId($conexion,$_SESSION['carrusel'][0]->getIdContenido());
            unset($_SESSION['carrusel'][0]);
            $_SESSION['carrusel']= array_values ($_SESSION['carrusel']);
            return $contenido;
        }


    }

    
?>