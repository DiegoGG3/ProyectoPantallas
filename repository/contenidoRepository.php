<?php
 class contenidoRepository{
    public static function crearContenido($idContenido, $tipo, $url, $formato, $duracion) {
        $contenido = new contenido($idContenido, $tipo, $url, $formato, $duracion);
        return $contenido;
    }
    
    public static function arrayContenido($objetos) {
        $arrayContenido = array();
        foreach ($objetos as $array) {
            array_push($arrayContenido, contenidoRepository::crearContenido(
                $array->idContenido,
                $array->tipo,
                $array->url,
                $array->formato,
                $array->duracion
            ));
        }
        return $arraycontenido;
    }
    
    public static function añadirContenido($conexion, $contenido) {
        $preparedConexion = $conexion->prepare("INSERT INTO contenido(tipo, url, formato, duracion)
            VALUES (:tipo, :url, '', '')");
    
        $tipo = $contenido->getTipo();
        $url = $contenido->getUrl();
    
        $preparedConexion->bindParam(':tipo', $tipo);
        $preparedConexion->bindParam(':url', $url);
    
        $preparedConexion->execute();
    }
    
    

    public static function borrarContenido($conexion, $id) {
        $preparedConexion = $conexion->prepare("DELETE FROM contenido WHERE idContenido = :id");
    
        $preparedConexion->bindParam(':id', $id);
    
        $preparedConexion->execute();
    }
 
}
?>