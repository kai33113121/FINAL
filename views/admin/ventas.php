<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros en Venta - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image:
                linear-gradient(135deg, rgba(87, 87, 87, 0.65) 0%, rgba(120, 107, 132, 0.85) 100%),
                url('/FINAL/public/img/sideadmin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .bg-overlay {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .sales-container {
            padding: 2rem 0;
        }

        .sales-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .sales-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .sales-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-purple {
            background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%) !important;
            color: white !important;
        }

        .table-purple th {
            color: white !important;
            border: none !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-hover tbody tr {
            transition: all 0.3s ease;
        }

        .table-hover tbody tr:hover {
            background: rgba(78, 6, 97, 0.05) !important;
            transform: translateY(-1px);
        }

        .btn-outline-custom {
            border: 2px solid #4e0661ff;
            color: #4e0661ff;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: #4e0661ff;
            color: white;
            transform: translateY(-1px);
        }

        .book-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e9ecef;
        }

        .book-title {
            font-weight: 600;
            color: #2f012eff;
        }

        .book-author {
            font-weight: 500;
            color: #495057;
        }

        .book-price {
            font-weight: 700;
            color: #00b894;
            font-size: 1.1rem;
        }

        .user-id {
            background: linear-gradient(135deg, #4e0661ff 0%, #2f012eff 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .description-text {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .sales-container {
                padding: 1rem 0;
            }

            .sales-header {
                padding: 1.5rem;
            }

            .description-text {
                max-width: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid sales-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card sales-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Tabla -->
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
                                                    <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>"
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

<!-- 
NOTA PARA EL BACKEND:
Tu consulta en el controlador debe ser algo así:

$sql = "SELECT lv.*, u.nombre as nombre_usuario 
        FROM libros_venta lv 
        LEFT JOIN usuarios u ON lv.id_usuario = u.id 
        ORDER BY lv.fecha_publicacion DESC";

Para que funcione correctamente con esta vista, necesitas:
1. Usar la tabla 'libros_venta' 
2. Hacer JOIN con 'usuarios' para obtener el nombre
3. La variable debe llamarse $librosEnVenta
4. Los campos disponibles serán: id, titulo, autor, descripcion, precio, imagen, estado, id_usuario, nombre_usuario
-->