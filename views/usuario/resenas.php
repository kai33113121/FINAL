<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reseñas - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>⭐ Reseñas del libro</h2>
<p>Promedio: <?= round($promedio, 1) ?> / 5</p>

<?php if (!empty($_SESSION['usuario'])): ?>
    <?php
    $resena = new Resena();
    $yaResenado = $resena->yaResenado($_GET['id'], $_SESSION['usuario']['id']);
    ?>
    <?php if (!$yaResenado): ?>
        <form method="POST" action="index.php?c=ResenaController&a=agregar">
            <input type="hidden" name="libro_id" value="<?= $_GET['id'] ?>">
            <div class="mb-3">
                <label>Calificación (1 a 5)</label>
                <input type="number" name="calificacion" class="form-control" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label>Comentario</label>
                <textarea name="comentario" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Enviar reseña</button>
        </form>
    <?php else: ?>
        <div class="alert alert-info">Ya has dejado una reseña para este libro.</div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-warning">Debes iniciar sesión para dejar una reseña.</div>
<?php endif; ?>

<hr>
<h4>📖 Comentarios</h4>
<?php if (count($resenas) > 0): ?>
    <?php foreach ($resenas as $r): ?>
        <div class="border p-3 mb-2 rounded">
            <strong><?= htmlspecialchars($r['nombre_usuario']) ?></strong> - 
            <span class="text-warning"><?= str_repeat('★', $r['calificacion']) ?></span><br>
            <p><?= nl2br(htmlspecialchars($r['comentario'])) ?></p>
            <small class="text-muted"><?= $r['fecha'] ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">Aún no hay reseñas para este libro.</p>
<?php endif; ?>
</div>
</body>
</html>