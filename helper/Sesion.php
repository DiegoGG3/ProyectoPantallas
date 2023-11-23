<?php
class Sesion
{
    public static function logIn($rol){
        Sesion::iniciar();
        Sesion::escribir('user',$rol);
    }
    public static function iniciar()
    {
        session_start();
    }

    public static function leer(string $clave)
    {
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        }
        return null;
    }

    public static function existe(string $clave)
    {
        return isset($_SESSION[$clave]);
    }

    public static function escribir($clave, $valor)
    {
        $_SESSION[$clave] = $valor;
    }

    public static function eliminar($clave)
    {
        if (isset($_SESSION[$clave])) {
            unset($_SESSION[$clave]);
        }
    }
}
?>