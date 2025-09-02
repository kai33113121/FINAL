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

        .explorar-row {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            align-items: stretch;
        }

        .explorar-card {
            min-width: 320px;
            max-width: 320px;
            min-height: 560px;
            max-height: 560px;
            display: flex;
            flex-direction: column;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(106, 27, 154, 0.08);
            background: #ede7f6;
            overflow: hidden;
            transition: box-shadow 0.3s, transform 0.3s;
            align-items: stretch;
            position: relative;
        }

        .explorar-card:hover {
            box-shadow: 0 8px 32px rgba(106, 27, 154, 0.18);
            transform: translateY(-6px) scale(1.03);
        }

        .explorar-card .card-img-top {
            height: 220px;
            object-fit: cover;
            border-radius: 16px 16px 0 0;
            flex-shrink: 0;
        }

        .explorar-card .card-body {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 1.2rem;
            min-height: 260px;
            position: relative;
        }

        .explorar-card .card-content {
            /* Nuevo contenedor para el contenido textual */
            flex: 1 1 auto;
            margin-bottom: 1.8rem;
            /* Espacio para los botones, evita solapamiento */
        }

        .explorar-card .btn-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            margin-bottom: 0.2rem;
            position: static;
            /* Elimina position absolute, usa flujo normal */
            left: auto;
            right: auto;
            bottom: auto;
            z-index: auto;
            background: transparent;
        }

        /* Para evitar que el contenido textual se solape con los botones */
        .explorar-card .card-body {
            padding-bottom: 6.5rem;
        }

        .explorar-card .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #6a1b9a;
            margin-bottom: 0.5rem;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .explorar-card .card-text {
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
            color: #333;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .explorar-row {
                gap: 1rem;
            }

            .explorar-card {
                min-width: 98vw;
                max-width: 98vw;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">🔍 Explorar libros disponibles</h2>
        <div class="explorar-row">
            <!-- Libros del catálogo del admin -->
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <div class="explorar-card">
                        <img src="public/img/libros/<?= $libro['imagen'] ?>" class="card-img-top" alt="Portada">
                        <div class="card-body">
                            <div class="card-content">
                                <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($libro['autor']) ?> - <?= htmlspecialchars($libro['genero']) ?></p>
                                <p class="card-text"><small>Estado: <?= htmlspecialchars($libro['estado']) ?></small></p>
                                <p class="card-text"><small>Subido por: <?= htmlspecialchars($libro['nombre']) ?></small></p>
                            </div>
                            <div class="btn-group">
                                <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>" class="btn btn-outline-purple btn-sm">📖 Ver detalle</a>
                                <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>" class="btn btn-outline-purple btn-sm">Solicitar intercambio</a>
                                <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>" class="btn btn-custom-purple btn-sm">Agregar al carrito</a>
                                <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>" class="btn btn-outline-purple btn-sm">✍️ Escribir reseña</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No hay libros disponibles.</p>
            <?php endif; ?>
        </div>
        <hr class="my-5">
        <h2 class="mb-4 text-center">💰 Libros en Venta</h2>
        <div class="explorar-row">
            <!-- Libros subidos por usuarios (venta) -->
            <?php if (!empty($libros_venta)): ?>
                <?php foreach ($libros_venta as $libro): ?>
                    <div class="explorar-card">
                        <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="Portada">
                        <div class="card-body">
                            <div class="card-content">
                                <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($libro['autor'] ?? 'Autor desconocido') ?> - <?= htmlspecialchars($libro['genero'] ?? 'Género no definido') ?>
                                </p>
                                <p class="card-text"><small>Estado: <?= htmlspecialchars($libro['estado'] ?? 'Sin estado') ?></small></p>
                                <p class="card-text"><small>Subido por: <?= htmlspecialchars($libro['nombre'] ?? 'Usuario anónimo') ?></small></p>
                            </div>
                            <div class="btn-group">
                                <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?= $libro['id'] ?>" class="btn btn-outline-purple btn-sm">📖 Ver detalle</a>
                                <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?>" class="btn btn-outline-purple btn-sm">Solicitar intercambio</a>
                                <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?>&tipo=venta" class="btn btn-custom-purple btn-sm">Agregar al carrito</a>
                                <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?>" class="btn btn-outline-purple btn-sm">✍️ Escribir reseña</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No hay libros en venta disponibles.</p>
            <?php endif; ?>
        </div>
    </div>
</body>



</html>

