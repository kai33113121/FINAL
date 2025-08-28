<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Explorar Libros - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom-purple {
            background-color: #7e57c2;
            color: white;
        }

        .btn-custom-purple:hover {
            background-color: #5e35b1;
        }

        .btn-outline-purple {
            border-color: #9575cd;
            color: #6a1b9a;
        }

        .btn-outline-purple:hover {
            background-color: #9575cd;
            color: white;
        }

        .bg-purple-light {
            background-color: #ede7f6;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">🔍 Explorar libros disponibles</h2>
        <div class="row">

            <!-- Libros del catálogo del admin -->
            <?php foreach ($libros as $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-purple-light">
                        <img src="public/img/<?= $libro['imagen'] ?>" class="card-img-top" alt="Portada">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($libro['autor']) ?> -
                                <?= htmlspecialchars($libro['genero']) ?>
                            </p>
                            <p class="card-text"><small>Estado: <?= htmlspecialchars($libro['estado']) ?></small></p>
                            <p class="card-text"><small>Subido por: <?= htmlspecialchars($libro['nombre']) ?></small></p>
                            <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-purple btn-sm">Solicitar intercambio</a>
                            <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>"
                                class="btn btn-custom-purple btn-sm">Agregar al carrito</a>
                            <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>"
                                class="btn btn-outline-purple btn-sm mt-1">✍️ Escribir reseña</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Libros subidos por usuarios -->
            <?php foreach ($libros_venta as $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-purple-light shadow-sm">
                        <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="Portada">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text">
                                <?= htmlspecialchars($libro['autor'] ?? 'Autor desconocido') ?> -
                                <?= htmlspecialchars($libro['genero'] ?? 'Género no definido') ?>
                            </p>
                            <p class="card-text"><small>Estado:
                                    <?= htmlspecialchars($libro['estado'] ?? 'Sin estado') ?></small></p>
                            <p class="card-text"><small>Subido por:
                                    <?= htmlspecialchars($libro['nombre'] ?? 'Usuario anónimo') ?></small></p>
                            <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-purple btn-sm">Solicitar intercambio</a>
                            <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>&tipo=venta"
                                class="btn btn-custom-purple btn-sm">Agregar al carrito</a>
                            <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>"
                                class="btn btn-outline-purple btn-sm mt-1">✍️ Escribir reseña</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>