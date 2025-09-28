<link rel="stylesheet" href="public/css/evento_detalle.css">
<div class="container mt-4">
    <div class="mb-4">
        <a href="index.php?c=EventoController&a=listar" class="btn-back">
            <i class="bi bi-arrow-left me-2"></i>Volver a Foros
        </a>
    </div>
    <div class="forum-detail-card">
        <div class="forum-header">
            <h2 class="mb-2"><?= htmlspecialchars($datosEvento['titulo']) ?></h2>
            <p class="mb-0 opacity-75">
                <i class="bi bi-calendar3 me-2"></i>
                Publicado el <?= date('d M Y', strtotime($datosEvento['fecha_creacion'])) ?>
            </p>
        </div>
        <div class="card-body p-4">
            <div class="mb-3">
                <?= nl2br(htmlspecialchars($datosEvento['descripcion'])) ?>
            </div>
            <div class="d-flex align-items-center gap-3 text-muted">
                <span>
                    <i class="bi bi-chat-dots me-1"></i>
                    <?= count($comentarios) ?> comentarios
                </span>
                <span>
                    <i class="bi bi-clock me-1"></i>
                    <?= $datosEvento['fecha_creacion'] ?>
                </span>
            </div>
        </div>
    </div>
    <div class="comment-form">
        <h5 class="fw-bold mb-3 text-purple">
            <i class="bi bi-chat-square-text me-2"></i>
            Agregar comentario
        </h5>
        <form method="POST" action="index.php?c=EventoController&a=comentar">
            <input type="hidden" name="id_evento" value="<?= $datosEvento['id'] ?>">
            <div class="mb-3">
                <textarea name="comentario" class="form-control" rows="4"
                    placeholder="Comparte tu opinión sobre este tema..." required></textarea>
            </div>
            <button type="submit" class="btn-comment">
                <i class="bi bi-send me-2"></i>
                Enviar comentario
            </button>
        </form>
    </div>
    <div class="mb-4">
        <h5 class="fw-bold mb-4 text-purple">
            <i class="bi bi-chat-left-text me-2"></i>
            Comentarios (<?= count($comentarios) ?>)
        </h5>
        <?php if (!empty($comentarios)): ?>
            <?php foreach ($comentarios as $c): ?>
                <div class="comment-card">
                    <div class="d-flex align-items-start gap-3">
                        <div class="flex-shrink-0">
                            <div class="bg-purple text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 45px; height: 45px;">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0 text-purple">
                                    <?= htmlspecialchars($c['usuario']) ?>
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    <?= date('d M Y - H:i', strtotime($c['fecha'])) ?>
                                </small>
                            </div>
                            <p class="mb-0">
                                <?= nl2br(htmlspecialchars($c['comentario'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-chat-square-dots text-purple" style="font-size: 3rem; opacity: 0.5;"></i>
                <h5 class="mt-3 text-purple">No hay comentarios aún</h5>
                <p class="text-muted">Sé el primero en comentar este foro</p>
            </div>
        <?php endif; ?>
    </div>
</div>