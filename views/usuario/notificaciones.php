<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificaciones - LibrosWap</title>
   <link rel="stylesheet" href="public/css/notificaciones.css">
</head>
<body>
    <div class="notificaciones-container">
        <div class="container">
            <div class="hero-notificaciones">
                <div class="text-center">
                    <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">🔔 Notificaciones</h1>
                    <p class="lead">Mantente al tanto de todas tus actividades en LibrosWap</p>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="stats-mini">
                        <div class="stat-number">
                            <?php
                            $total = count($notificaciones ?? []);
                            echo $total;
                            ?>
                        </div>
                        <div class="stat-label">Total Notificaciones</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stats-mini">
                        <div class="stat-number">
                            <?php
                            $noLeidas = 0;
                            if (!empty($notificaciones)) {
                                foreach ($notificaciones as $n) {
                                    if (empty($n['leida'])) {
                                        $noLeidas++;
                                    }
                                }
                            }
                            echo $noLeidas;
                            ?>
                        </div>
                        <div class="stat-label">No Leídas</div>
                    </div>
                </div>
            </div>
            <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
                <div class="notificaciones-list">
                    <?php foreach ($notificaciones as $index => $notif): ?>
                        <?php
                        $esLeida = !empty($notif['leida']);
                        $claseLeida = $esLeida ? 'leida' : 'no-leida';
                        $mensaje = $notif['mensaje'] ?? '';
                        $tipoIcon = 'icon-sistema';
                        $iconoEmoji = '📢';
                        if (strpos($mensaje, 'intercambio') !== false) {
                            $tipoIcon = 'icon-intercambio';
                            $iconoEmoji = '🔄';
                        } elseif (strpos($mensaje, 'compra') !== false) {
                            $tipoIcon = 'icon-compra';
                            $iconoEmoji = '🛒';
                        }
                        ?>
                        <div class="notificacion-card <?= $claseLeida ?> notificacion-item" 
                             style="animation-delay: <?= $index * 0.1 ?>s;">
                            <div class="notificacion-content">
                                <div class="notificacion-icon <?= $tipoIcon ?>">
                                    <?= $iconoEmoji ?>
                                </div>
                                <div class="notificacion-body">
                                    <div class="notificacion-mensaje">
                                        <?= htmlspecialchars($mensaje) ?>
                                    </div>
                                    <div class="notificacion-fecha">
                                        <i class="bi bi-clock"></i>
                                        <?= htmlspecialchars($notif['fecha'] ?? '') ?>
                                    </div>
                                </div>
                                <div class="notificacion-actions">
                                    <?php if (!empty($notif['intercambio_id'])): ?>
                                        <a href="index.php?c=IntercambioController&a=verSolicitud&id=<?= (int)$notif['intercambio_id'] ?>&noti=<?= (int)$notif['id'] ?>" 
                                           class="btn-ver">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    <?php elseif (!empty($notif['link'])): ?>
                                        <a href="<?= htmlspecialchars($notif['link']) ?>" 
                                           class="btn-ver">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($esLeida): ?>
                                        <span class="badge-leida">
                                            <i class="bi bi-check2"></i> Leída
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-bell-slash"></i>
                    <h3 style="color: var(--purple); margin-bottom: 15px;">No tienes notificaciones</h3>
                    <p class="text-muted">Cuando tengas nuevas notificaciones aparecerán aquí</p>
                    <div class="mt-4">
                        <a href="index.php?c=LibroController&a=explorar" 
                           class="btn-ver" 
                           style="padding: 12px 30px;">
                            <i class="bi bi-compass"></i> Explorar Libros
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificaciones = document.querySelectorAll('.notificacion-item');
            notificaciones.forEach((notif, index) => {
                setTimeout(() => {
                    notif.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>
</body>
</html>