<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros - Admin</title>
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

        .books-container {
            padding: 2rem 0;
        }

        .books-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .books-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .books-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .btn-custom {
            background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 6, 151, 0.3);
            color: white;
        }

        .btn-outline-purple {
            border: 2px solid #4e0661ff;
            color: #4e0661ff;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-purple:hover {
            background: #4e0661ff;
            color: white;
            transform: translateY(-1px);
        }

        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-light {
            background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%) !important;
            color: white !important;
        }

        .table-light th {
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

        .badge-custom {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        .add-book-btn {
            position: absolute;
            top: 50%;
            right: 2rem;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            .books-container {
                padding: 1rem 0;
            }

            .books-header {
                padding: 1.5rem;
                position: relative;
            }

            .add-book-btn {
                position: static;
                transform: none;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid books-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card books-card bg-overlay">
                    <!-- Header -->
                    <div class="books-header position-relative">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-book books-icon"></i>
                            </div>
                            <div class="col-md-8 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📚 Gestión de Libros</h2>
                                <p class="mb-0 opacity-75">Administra todos los libros del sistema</p>
                            </div>
                            <div class="col-md-2 text-center d-none d-md-block">
                                <a href="index.php?c=AdminController&a=subirLibro" class="btn btn-custom">
                                    <i class="fas fa-plus me-2"></i>Subir Libro
                                </a>
                            </div>
                        </div>
                        <div class="d-md-none text-center mt-3">
                            <a href="index.php?c=AdminController&a=subirLibro" class="btn btn-custom">
                                <i class="fas fa-plus me-2"></i>Subir Libro
                            </a>
                        </div>
                    </div>

                    <!-- Tabla -->
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-custom table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($libros as $libro): ?>
                                        <tr>
                                            <td><span class="badge bg-secondary badge-custom"><?= $libro['id'] ?></span>
                                            </td>
                                            <td class="fw-semibold"><?= htmlspecialchars($libro['titulo']) ?></td>
                                            <td><?= htmlspecialchars($libro['autor']) ?></td>
                                            <td><?= htmlspecialchars($libro['nombre_usuario']) ?></td>
                                            <td>
                                                <span class="badge badge-custom bg-info">
                                                    <?= htmlspecialchars($libro['estado']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="index.php?c=AdminController&a=editarLibro&id=<?= $libro['id'] ?>"
                                                    class="btn btn-outline-purple btn-sm me-2">
                                                    <i class="fas fa-edit me-1"></i>Editar
                                                </a>
                                                <a href="index.php?c=AdminController&a=eliminarLibro&id=<?= $libro['id'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de eliminar este libro?')">
                                                    <i class="fas fa-trash me-1"></i>Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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