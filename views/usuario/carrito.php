<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>🛒 Mi carrito</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($items as $item): 
                    $total += $item['precio'];
                ?>
                    <tr>
                        <td>
                            <?php if (!empty($item['imagen'])): ?>
                                <img src="public/img/libros/<?= htmlspecialchars($item['imagen']) ?>" alt="Portada" style="width:50px;height:70px;object-fit:cover;">
                            <?php else: ?>
                                <img src="public/img/libros/default.png" alt="Portada" style="width:50px;height:70px;object-fit:cover;">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($item['titulo']) ?></td>
                        <td><?= htmlspecialchars($item['autor']) ?></td>
                        <td>$<?= number_format($item['precio'], 2) ?></td>
                        <td>
                            <a href="index.php?c=CarritoController&a=eliminar&id=<?= $item['id'] ?>"
                                class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mb-3">
            <strong>Total: $<?= number_format($total, 2) ?></strong>
        </div>
        <a href="index.php?c=CarritoController&a=confirmar" class="btn btn-success">Confirmar compra</a>
    </div>
</body>

    <footer id="contacto" class="bg-dark text-white py-5">
        <div class="container text-center">
            <h5 class="mb-3">📚 LibrosWap — Compartiendo conocimiento desde 2025</h5>
            <p class="mb-3">Diseñado con 💜 LIBROS WAP</p>
            <div class="d-flex justify-content-center gap-4 mb-3">
                <a href="#" class="text-white text-decoration-none">Inicio</a>
                <a href="#" class="text-white text-decoration-none">Libros</a>
                <a href="#" class="text-white text-decoration-none">Blog</a>
                <a href="#" class="text-white text-decoration-none">Contacto</a>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <i class="bi bi-facebook fs-5"></i>
                <i class="bi bi-instagram fs-5"></i>
                <i class="bi bi-twitter fs-5"></i>
            </div>
            <p class="mt-4 small">© 2025 LibrosWap. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>