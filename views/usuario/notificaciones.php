<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificaciones de intercambio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>🔔 Notificaciones de intercambio</h2>
        <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
            <ul class="list-group">
                <?php foreach ($notificaciones as $notif): ?>
                    <li class="list-group-item">
                        <?= htmlspecialchars($notif['mensaje'] ?? '') ?>
                        <br>
                        <span class="text-muted small"><?= htmlspecialchars($notif['fecha'] ?? '') ?></span>
                        <?php if (isset($notif['id'])): ?>
                        <form method="POST" action="index.php?c=IntercambioController&a=responderSolicitud" style="display:inline;">
                            <input type="hidden" name="intercambio_id" value="<?= htmlspecialchars($notif['id']) ?>">
                            <button name="accion" value="aceptar" class="btn btn-success btn-sm">Aceptar</button>
                            <button name="accion" value="rechazar" class="btn btn-danger btn-sm">Rechazar</button>
                        </form>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="alert alert-info">No tienes notificaciones pendientes.</div>
        <?php endif; ?>
        <?php
        // Depuración temporal: muestra el array de notificaciones
        // Elimina esto cuando verifiques que llegan datos
        echo '<pre style="background:#fffbe6;border:1px solid #ccc;padding:10px;">';
        print_r($notificaciones);
        echo '</pre>';
        ?>
    </div>
</body>
</html>