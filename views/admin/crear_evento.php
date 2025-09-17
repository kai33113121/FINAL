<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Foros - Admin</title>
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

        .forum-container {
            padding: 2rem 0;
        }

        .forum-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .forum-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .forum-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .text-purple {
            color: #2f012eff !important;
        }

        .section-title {
            background: linear-gradient(135deg, #4e0661ff 0%, #2f012eff 100%);
            color: white;
            padding: 1rem 1.5rem;
            margin: 2rem 0 1.5rem 0;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-purple {
            background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 6, 97, 0.3);
            color: white;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4e0661ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 6, 97, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #2f012eff;
            margin-bottom: 0.8rem;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            border: 1px solid rgba(78, 6, 97, 0.1);
        }

        .list-group-item {
            border: none;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-warning {
            border: 2px solid #fdcb6e;
            color: #e17055;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-outline-warning:hover {
            background: #fdcb6e;
            border-color: #fdcb6e;
            color: white;
        }

        .btn-outline-danger {
            border: 2px solid #e84393;
            color: #e84393;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-outline-danger:hover {
            background: #e84393;
            border-color: #e84393;
            color: white;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(116, 185, 255, 0.1) 0%, rgba(9, 132, 227, 0.1) 100%);
            border: 1px solid #74b9ff;
            color: #0984e3;
            border-radius: 12px;
        }

        .divider {
            border: none;
            height: 2px;
            background: linear-gradient(135deg, #4e0661ff 0%, #a29bfe 100%);
            margin: 2rem 0;
        }

        .forum-title {
            color: #2f012eff;
            font-weight: 700;
        }

        .forum-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .forum-container {
                padding: 1rem 0;
            }

            .forum-header {
                padding: 1.5rem;
            }

            .form-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid forum-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card forum-card bg-overlay">
                    <!-- Header -->
                    <div class="forum-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-comments forum-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">💬 Gestión de Foros</h2>
                                <p class="mb-0 opacity-75">Crea y administra foros de discusión para la comunidad</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="card-body p-4">

                        <!-- Formulario de creación -->
                        <div class="form-section">
                            <h4 class="fw-bold mb-4 text-purple">
                                <i class="fas fa-plus-circle me-2"></i>Crear nuevo foro
                            </h4>

                            <form method="POST" action="index.php?c=EventoController&a=guardar">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="titulo" class="form-label">
                                            <i class="fas fa-heading me-2 text-muted"></i>Título del foro
                                        </label>
                                        <input type="text" name="titulo" id="titulo" class="form-control"
                                            placeholder="Ingresa un título descriptivo para el foro" required>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <label for="descripcion" class="form-label">
                                            <i class="fas fa-align-left me-2 text-muted"></i>Descripción
                                        </label>
                                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4"
                                            placeholder="Describe el tema del foro y las reglas de participación..."
                                            required></textarea>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-purple btn-lg">
                                            <i class="fas fa-save me-2"></i>Crear foro
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <hr class="divider">

                        <!-- Lista de foros -->
                        <h5 class="section-title">
                            <i class="fas fa-list me-2"></i>Foros creados
                        </h5>

                        <?php if (!empty($eventos)): ?>
                            <div class="list-group">
                                <?php foreach ($eventos as $e): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-start">
                                                <div class="me-3">
                                                    <i class="fas fa-comments text-muted"
                                                        style="font-size: 1.5rem; margin-top: 0.25rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="forum-title mb-1"><?= htmlspecialchars($e['titulo']) ?></h6>
                                                    <small class="forum-date">
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        Creado: <?= htmlspecialchars($e['fecha_creacion']) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <a href="index.php?c=EventoController&a=editar&id=<?= $e['id'] ?>"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit me-1"></i>Editar
                                            </a>
                                            <a href="index.php?c=EventoController&a=eliminar&id=<?= $e['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este foro?')">
                                                <i class="fas fa-trash me-1"></i>Eliminar
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info mt-3 text-center">
                                <i class="fas fa-info-circle me-2"></i>
                                Aún no has creado ningún foro. ¡Crea el primero usando el formulario de arriba!
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