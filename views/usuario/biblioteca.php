<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>📚 Mis libros subidos</h2>
        <div class="row">
            <?php foreach ($misLibros as $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="public/img/<?= $libro['imagen'] ?>" class="card-img-top" alt="Portada">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($libro['autor']) ?> -
                                <?= htmlspecialchars($libro['genero']) ?>
                            </p>
                            <p class="card-text"><small><?= htmlspecialchars($libro['estado']) ?></small></p>
                            <a href="index.php?c=LibroController&a=editar&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-primary btn-sm">Editar</a>
                            <a href="index.php?c=LibroController&a=eliminar&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-danger btn-sm">Eliminar</a>
                                <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>" class="btn btn-outline-warning btn-sm">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>