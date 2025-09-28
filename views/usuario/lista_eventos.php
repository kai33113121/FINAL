<link rel="stylesheet" href="public/css/eventos.css">
<div class="container mt-4">
    <div class="forum-header text-center">
        <h1 class="mb-2">Centro de Discusión</h1>
        <p class="mb-0">Únete a las conversaciones de la comunidad literaria</p>
    </div>
    <div class="stats-row">
        <div class="row">
            <div class="col-md-3 stat-item">
                <div class="stat-number"><?= count($eventos) ?></div>
                <div>Foros Activos</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number"><?= count($eventos) ?></div>
                <div>Participantes</div>
            </div>
            
        </div>
    </div>
    <?php if (!empty($eventos)): ?>
        <div class="row">
            <div class="col-12">
                <h4 class="fw-bold mb-3 text-purple">Foros activos</h4>
                <?php foreach ($eventos as $e): ?>
                    <a href="index.php?c=EventoController&a=ver&id=<?= $e['id'] ?>"
                        class="card-forum d-block text-decoration-none">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="fw-bold text-purple mb-2">
                                        <i class="bi bi-chat-square-text me-2"></i>
                                        <?= htmlspecialchars($e['titulo']) ?>
                                    </h5>
                                    <p class="text-muted mb-2">
                                        <?= !empty($e['descripcion']) ? htmlspecialchars(substr($e['descripcion'], 0, 150)) . '...' : 'Únete a esta discusión sobre literatura.' ?>
                                    </p>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        <?= date('d M Y', strtotime($e['fecha_creacion'])) ?>
                                        <?php if (!empty($e['creador_nombre'])): ?>
                                            | <i class="bi bi-person me-1"></i>
                                            <?= htmlspecialchars($e['creador_nombre']) ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <div class="d-flex justify-content-md-end align-items-center gap-3">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <i class="bi bi-chat-square-dots text-purple" style="font-size: 4rem; opacity: 0.5;"></i>
            <h4 class="mt-3 text-purple">No hay foros disponibles</h4>
            <p class="text-muted">Sé el primero en crear un foro</p>
        </div>
    <?php endif; ?>
</div>