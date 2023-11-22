<?php
require_once '../helper/autocargar.php';

$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] === UPLOAD_ERR_OK) {
        // El archivo se ha cargado correctamente
        $nombreArchivo = $_FILES['fichero']['name'];
        move_uploaded_file($_FILES['fichero']['tmp_name'], '../imagenes/' . $nombreArchivo);

        // Puedes hacer más cosas con el archivo si es necesario
        $contenido=contenidoRepository::crearContenido("","Imagen",'../imagenes/' . $nombreArchivo,"","");
        contenidoRepository::añadirContenido($conexion,$contenido);
    } else {
        // No se ha cargado un archivo o ha ocurrido un error
        echo "Error al cargar el archivo";
    }
} else {
    // Método de solicitud incorrecto
    echo "Método de solicitud incorrecto";
}

?>
