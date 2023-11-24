<?php
    class funcionesCarrusel{
        public static function cargarCarrusel($rol){
            $conexion = DB::abreConexion(); 

            $matriz=BDRepository::selectUniversal($conexion, 'noticias');
            foreach($matriz as $noticia){
                if(strtoupper($rol)==strtoupper($noticia->getPerfil()) || strtoupper($noticia->getPerfil())=="TODOS"){
                    for($i=0;$i<$noticia->getPrioridad()-1;$i++){
                        array_push($matriz,$noticia);
                    }
                }else{
                    unset($matriz[array_search($noticia, $matriz)]);
                }
            }

            $matriz =array_values($matriz);
            shuffle($matriz);
            Sesion::escribir('carrusel',$matriz);
        }

        public static function devolverContenido(){
            $conexion = DB::abreConexion();
    
            
            $contenido=contenidoRepository::devolverContenidoPorId($conexion,$_SESSION['carrusel'][0]->getIdContenido());
            unset($_SESSION['carrusel'][0]);
            $_SESSION['carrusel']= array_values ($_SESSION['carrusel']);
            return $contenido;
        }
    }    
?>