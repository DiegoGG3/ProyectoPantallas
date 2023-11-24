<?php

    spl_autoload_register('autocargar');

    function autocargar($clase){
        $entities=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/entities/".$clase.'.php';
        $repository=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/repository/".$clase.'.php';
        $helper=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/helper/".$clase.'.php';

        $database=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/database/".$clase.'.php';
        $interfaz=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/interfaz/".$clase.'.php';
        $css=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/css/".$clase.'.php';
        $principal=$_SERVER['DOCUMENT_ROOT']."/ProyectoPantallas/principal/".$clase.'.php';




        if(file_exists($entities)){
            require_once $entities;
        }else if(file_exists($repository)){
            require_once $repository;
            
        }else if(file_exists($database)){
            require_once $database;

        }else if(file_exists($helper)){
            require_once $helper;

        }else if(file_exists($interfaz)){
            require_once $interfaz;

        }else if(file_exists($css)){
            require_once $css;
        }
        else if(file_exists($principal)){
            require_once $principal;

        }
        else if(file_exists($css)){
            require_once $css;
        }else{
            var_dump($repository);
        }
    };

?>