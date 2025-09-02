<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($libro['titulo']) ?> - Detalle</title>
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

<body class="bg-light">
    <div class="container py-5">
        <div class="card bg-purple-light shadow-lg">
            <div class="row g-0">
                <!-- Imagen -->
                <div class="col-md-4">
                    <img src="public/img/<?= htmlspecialchars($libro['imagen'] ?? 'default.png') ?>" 
                         class="img-fluid rounded-start" alt="Portada de <?= htmlspecialchars($libro['titulo']) ?>">
                </div>

                <!-- Detalles -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title "><?= htmlspecialchars($libro['titulo']) ?></h2>
                        <p><strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?></p>
                        <p><strong>Género:</strong> <?= htmlspecialchars($libro['genero']) ?></p>
                        <p><strong>Modo:</strong> <?= htmlspecialchars($libro['modo']) ?></p>
                        <p><strong>Estado:</strong> <?= htmlspecialchars($libro['estado']) ?></p>

                        <!-- Botones -->
                        <div class="mt-3">
                            <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>"
                               class="btn btn-custom-purple btn-sm">🛒 Agregar al carrito</a>

                            <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>"
                               class="btn btn-outline-purple btn-sm">🔄 Solicitar intercambio</a>

                            <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>"
                               class="btn btn-outline-purple btn-sm">✍️ Escribir reseña</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reseñas -->
        <div class="mt-4">
            <h4>📖 Reseñas</h4>
            <?php if (!empty($resenas)): ?>
                <ul class="list-group">
                    <?php foreach ($resenas as $r): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($r['comentario']) ?>
                            <span class="badge bg-warning text-dark">⭐ <?= $r['calificacion'] ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">No hay reseñas para este libro.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

