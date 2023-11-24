<?php
    require_once '../helper/autocargar.php';
    $conexion = DB::abreConexion();
    $arrayValues = $_POST['valueInput'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a=$arrayValues[6];
        if($arrayValues[6]=="imagen"){
            if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] === UPLOAD_ERR_OK) {
                // El archivo se ha cargado correctamente
                
                $nombreArchivo = $_FILES['fichero']['name'];
                move_uploaded_file($_FILES['fichero']['tmp_name'], '../imagenes/' . $nombreArchivo);
                
                $contenido=contenidoRepository::crearContenido("","Imagen",'imagenes/' . $nombreArchivo,"",$arrayValues[4]);

                contenidoRepository::añadirContenido($conexion,$contenido);
                $idContenido = contenidoRepository::devolverIdContenidoPorUrl($conexion,'imagenes/' . $nombreArchivo);
    
                $noticia=noticiaRepository::crearNoticia("",$arrayValues[0], $arrayValues[1], $arrayValues[2], $arrayValues[3], $arrayValues[5],$arrayValues[4], $idContenido);
    
                noticiaRepository::añadirNoticia($conexion, $noticia);                
            } else {
                // No se ha cargado un archivo o ha ocurrido un error
                echo "Error al cargar el archivo";
            }
        }else if($arrayValues[6]=="enlace"){
                $nombreArchivo = $_POST['fichero'];
                
                $contenido=contenidoRepository::crearContenido("","Web",$nombreArchivo,"",$arrayValues[4]);
                contenidoRepository::añadirContenido($conexion,$contenido);
                $idContenido = contenidoRepository::devolverIdContenidoPorUrl($conexion,$nombreArchivo);
    
                $noticia=noticiaRepository::crearNoticia("",$arrayValues[0], $arrayValues[1], $arrayValues[2], $arrayValues[3], $arrayValues[5],$arrayValues[4], $idContenido);
    
                noticiaRepository::añadirNoticia($conexion, $noticia); 

        }if($arrayValues[6]=="video"){
            if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] === UPLOAD_ERR_OK) {
                 // El archivo se ha cargado correctamente
                
                $nombreArchivo = $_FILES['fichero']['name'];
                move_uploaded_file($_FILES['fichero']['tmp_name'], '../videos/' . $nombreArchivo);
                
                $contenido=contenidoRepository::crearContenido("","Video",'videos/' . $nombreArchivo,"",$arrayValues[4]);
                
                contenidoRepository::añadirContenido($conexion,$contenido);
                $idContenido = contenidoRepository::devolverIdContenidoPorUrl($conexion,'videos/' . $nombreArchivo);
    
                $noticia=noticiaRepository::crearNoticia("",$arrayValues[0], $arrayValues[1], $arrayValues[2], $arrayValues[3], $arrayValues[5],$arrayValues[4], $idContenido);
    
                noticiaRepository::añadirNoticia($conexion, $noticia);                  
            } else {
                // No se ha cargado un archivo o ha ocurrido un error
                echo "Error al cargar el archivo";
            }
        }
    } else {
        // Método de solicitud incorrecto
        echo "Método de solicitud incorrecto";
    }




?>