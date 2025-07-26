<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        .text-purple {
            color: #6f42c1;
        }

        .btn-outline-purple {
            border-color: #6f42c1;
            color: #6f42c1;
        }

        .btn-outline-purple:hover {
            background-color: #6f42c1;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="row">
            <!-- 🟢 Usuarios disponibles -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="fw-bold text-purple mb-0">
                            <i class="bi bi-person-plus-fill me-2"></i>Usuarios disponibles para chatear
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($usuarios as $u): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="<?= $u['foto'] ?? 'default.jpg' ?>" class="rounded-circle me-3" width="40"
                                        height="40">
                                    <span class="fw-semibold"><?= htmlspecialchars($u['nombre']) ?></span>
                                </div>
                                <a href="index.php?c=MensajeController&a=chat&id=<?= $u['id'] ?>"
                                    class="btn btn-sm btn-outline-purple">
                                    <i class="bi bi-chat-dots me-1"></i>Iniciar chat
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- 🔵 Conversaciones activas -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="fw-bold text-purple mb-0">
                            <i class="bi bi-chat-left-text-fill me-2"></i>Conversaciones activas
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($conversaciones as $usuario): ?>
                                <div class="col-12 mb-3">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body d-flex align-items-center">
                                            <img src="<?= $usuario['foto'] ?? 'default.jpg' ?>" class="rounded-circle me-3"
                                                width="50" height="50">
                                            <div class="flex-grow-1">
                                                <h6
                                                    class="mb-1 fw-semibold d-flex justify-content-between align-items-center">
                                                    <?= htmlspecialchars($usuario['nombre']) ?>
                                                    <?php if (!empty($usuario['mensajes_no_leidos'])): ?>
                                                        <span
                                                            class="badge bg-danger ms-2"><?= $usuario['mensajes_no_leidos'] ?></span>
                                                    <?php endif; ?>
                                                </h6>
                                                <p class="text-muted mb-1 small text-truncate" style="max-width: 250px;">
                                                    <?= htmlspecialchars($usuario['ultimo_mensaje'] ?? 'Sin mensajes aún.') ?>
                                                </p>
                                            </div>
                                            <a href="index.php?c=MensajeController&a=chat&id=<?= $usuario['id'] ?>"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-arrow-right-circle me-1"></i>Continuar chat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php if (empty($conversaciones)): ?>
                                <div class="text-muted text-center mt-3">No hay conversaciones activas aún.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>