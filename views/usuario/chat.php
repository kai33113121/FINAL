<div class="container mt-4">
    <h4 class="fw-bold text-purple">Chat con <?= htmlspecialchars($otro_usuario['nombre']) ?></h4>

    <div class="border p-3 mb-3" style="max-height: 400px; overflow-y: auto;">
        <?php foreach ($mensajes as $m): ?>
            <div class="mb-2">
                <strong><?= $m['emisor_id'] == $_SESSION['usuario']['id'] ? 'Tú' : 'Usuario #' . $m['emisor_id'] ?>:</strong>
                <p class="mb-0"><?= htmlspecialchars($m['mensaje']) ?></p>
                <small class="text-muted"><?= $m['fecha_envio'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>

    <form method="POST" action="index.php?c=MensajeController&a=enviar">
        <input type="hidden" name="receptor_id" value="<?= $otro_usuario['id'] ?>">
        <div class="mb-3">
            <textarea name="mensaje" class="form-control" rows="3" placeholder="Escribe tu mensaje..." required></textarea>
        </div>
        <button type="submit" class="btn btn-purple">Enviar</button>
        <a href="index.php?c=MensajeController&a=mensajes" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>