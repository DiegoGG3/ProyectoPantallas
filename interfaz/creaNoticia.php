<?php


$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();



if (isset($_POST['crear'])) {
    $comienzo = $_POST['comienzo'];
    $fin = $_POST['fin'];
    $titulo = $_POST['titulo'];
    $prioridad = $_POST['prioridad'];
    $perfil = $_POST['perfil'];
    $duracion = $_POST['duracion'];
    $idContenido = $_POST['idContenido'];


    $noticia=noticiaRepository::crearNoticia("",$comienzo, $fin, $titulo, $prioridad, $perfil,$duracion, $idContenido);

    noticiaRepository::añadirNoticia($conexion, $noticia);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Noticias</title>
</head>
<body>

<h1>Crear Noticia</h1>

<form action="" method="POST" id="form">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>

    <label for="comienzo">Fecha de inicio:</label>
    <input type="datetime-local" name="comienzo" required><br>

    <label for="fin">Fecha de fin:</label>
    <input type="datetime-local" name="fin" required><br>

    <label for="prioridad">Prioridad:</label>
    <input type="number" name="prioridad" required><br>

    <label for="perfil">Dirigido:</label>
    <select name="perfil" required>
        <option value="Alumno">Alumno</option>
        <option value="Profesor">Profesor</option>
        <option value="Todos">Todos</option>
    </select><br>

    <label for="duracion">Duracion:</label>
    <input type="number" name="duracion" required><br>

    <label for="recurso">Recurso:</label>
    <select name="recurso" id="recurso" required>
        <option value="" selected disabled>Seleccione el recurso</option>

        <option value="Web">Web</option>
        <option value="Imagen">Imagen</option>
        <option value="Video">Video</option>
    </select><br>

    <div id="recursos">
    </div>
        <button type='submit' name='crear' id="crear">Crear Noticia</button>
</form>

</body>
<script src="./js/noticias.js"></script>

</html>
