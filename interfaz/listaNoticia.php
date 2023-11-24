<?php
    $conexion = DB::abreConexion();


$noticias = BDRepository::selectUniversal($conexion, 'noticias');
?>

<!DOCTYPE html>
<html>
<head>
    <script src='js/apiEliminarNoticia.js'></script>

    <title>Lista de Noticias</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Fecha Creacion</th>
            <th>Fecha Fin</th>
            <th>Titulo</th>
            <th>Prioridad</th>
            <th>Perfil</th>
            <th>Duracion</th>
            <th>Acciones</th>

        </tr>
       <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td id="<?php echo ($noticia->getId()); ?>"><?php echo $noticia->getId(); ?></td>
                <td><input type="datetime-local" value="<?php echo $noticia->getComienzo(); ?>"></td>
                <td><input type="datetime-local" value="<?php echo $noticia->getFin(); ?>"></td>
                <td><?php echo $noticia->getTitulo(); ?></td>
                <td><?php echo $noticia->getPrioridad(); ?></td>
                <td><?php echo $noticia->getPerfil(); ?></td>
                <td><?php echo $noticia->getDuracion(); ?></td>
                <td>
                    <button class="eliminar" onclick='eliminarNoticia(this)'>Eliminar</button>
                    <button class="modificar" onclick='eliminarNoticia(this)'>modificar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>