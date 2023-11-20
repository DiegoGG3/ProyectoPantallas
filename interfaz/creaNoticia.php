<?php


$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();



if (isset($_POST['crear'])) {
    $id = $_POST['id'];
    $comienzo = $_POST['comienzo'];
    $fin = $_POST['fin'];
    $titulo = $_POST['titulo'];
    $prioridad = $_POST['prioridad'];
    $duracion = $_POST['duracion'];

    $noticia=noticiaRepository::crearNoticia($id, $comienzo, $fin, $titulo, $prioridad, $duracion);

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

<form action="" method="post">

    <label for="comienzo">Fecha de inicio:</label>
    <input type="date" name="comienzo" required><br>

    <label for="fin">Fecha de fin:</label>
    <input type="date" name="fin" required><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>

    <label for="dirigido">Dirigido:</label>
    <select name="dirigido" required>
        <option value="alumno">Alumno</option>
        <option value="profesor">Profesor</option>
    </select><br>

    <label for="duracion">Duracion:</label>
    <input type="number" name="duracion" required><br>

    <button type='submit' name='crear'>Crear Noticia</button>
</form>

</body>
</html>
