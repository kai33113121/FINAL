<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros en Venta - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/ventas.css">
</head>
<body>
    <div class="container-fluid sales-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card sales-card bg-overlay">
                    <div class="sales-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-store sales-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">💰 Libros en Venta por Usuarios</h2>
                                <p class="mb-0 opacity-75">Gestiona los libros publicados para venta por los usuarios
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover align-middle">
                                <thead class="table-purple text-white">
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($librosEnVenta)): ?>
                                        <?php foreach ($librosEnVenta as $libro): ?>
                                            <tr>
                                                <td>
                                                    <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>"
                                                        class="book-image" alt="Libro">
                                                </td>
                                                <td class="book-title"><?= htmlspecialchars($libro['titulo']) ?></td>
                                                <td class="book-author"><?= htmlspecialchars($libro['autor']) ?></td>
                                                <td>
                                                    <div class="description-text"
                                                        title="<?= htmlspecialchars($libro['descripcion']) ?>">
                                                        <?= htmlspecialchars($libro['descripcion']) ?>
                                                    </div>
                                                </td>
                                                <td class="book-price">$<?= number_format($libro['precio'], 2) ?></td>
                                                <td>
                                                    <span
                                                        class="badge <?= $libro['estado'] === 'nuevo' ? 'bg-success' : 'bg-warning' ?> text-white px-3 py-2">
                                                        <?= ucfirst($libro['estado']) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="user-id"><?= htmlspecialchars($libro['nombre_usuario'] ?? $libro['id_usuario']) ?></span>
                                                </td>
                                                <td>
                                                    <a href="index.php?c=AdminController&a=editarVenta&id=<?= $libro['id'] ?>"
                                                        class="btn btn-outline-custom btn-sm me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="index.php?c=AdminController&a=eliminarVenta&id=<?= $libro['id'] ?>"
                                                        class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('¿Eliminar este libro?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="empty-state">
                                                <i class="fas fa-store-slash"></i>
                                                <h5 class="mt-3 mb-2">No hay libros en venta</h5>
                                                <p class="text-muted">Los libros publicados para venta por usuarios
                                                    aparecerán aquí</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (!empty($librosEnVenta)): ?>
                            <div class="mt-4 p-3 bg-light rounded">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h5 class="text-primary mb-1"><?= count($librosEnVenta) ?></h5>
                                        <small class="text-muted">Total Libros en Venta</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-success mb-1">
                                            $<?= number_format(array_sum(array_column($librosEnVenta, 'precio')), 2) ?>
                                        </h5>
                                        <small class="text-muted">Valor Total Inventario</small>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-info mb-1">
                                            <?= count(array_unique(array_column($librosEnVenta, 'id_usuario'))) ?>
                                        </h5>
                                        <small class="text-muted">Usuarios Vendedores</small>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
