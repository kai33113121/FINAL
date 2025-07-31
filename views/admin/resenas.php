<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reseñas - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>🛠️ Panel de reseñas</h2>
    <p>Total de reseñas: <strong><?= $total ?></strong></p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Calificación</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resenas as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($r['titulo_libro']) ?></td>
                    <td><?= $r['calificacion'] ?>/5</td>
                    <td><?= htmlspecialchars($r['comentario']) ?></td>
                    <td><?= $r['fecha'] ?></td>
                    <td>
                        <a href="index.php?c=ResenaController&a=eliminar&id=<?= $r['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar esta reseña?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>