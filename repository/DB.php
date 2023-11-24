<?php
class DB{
    private static $conexion=null;

    public static function abreConexion(){
        if(self::$conexion==null){
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            self::$conexion = new PDO('mysql:host=localhost;dbname=ProyectoPantalla', 'root', '', $opciones);
        }
        return self::$conexion;
    }

    public static function desconexion() {
        self::$conexion=null;
    }
}

?>