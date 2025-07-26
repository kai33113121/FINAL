<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Solicitar Intercambio - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>🔄 Solicitar intercambio</h2>
        <?php if ($libroSolicitado): ?>
            <p>Libro que deseas: <strong><?= htmlspecialchars($libroSolicitado['titulo']) ?></strong></p>
        <?php else: ?>
            <p>❌ Libro no encontrado.</p>
        <?php endif; ?>

        <form method="POST" action="index.php?c=IntercambioController&a=enviarSolicitud">
            <input type="hidden" name="libro_id_2" value="<?= $libroSolicitado['id'] ?>">
            <input type="hidden" name="usuario_2" value="<?= $libroSolicitado['usuario_id'] ?>">

            <div class="mb-3">
                <label>Selecciona uno de tus libros para ofrecer:</label>
                <select name="libro_id_1" class="form-control" required>
                    <?php foreach ($misLibros as $libro): ?>
                        <option value="<?= $libro['id'] ?>"><?= $libro['titulo'] ?> - <?= $libro['autor'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Enviar solicitud</button>
        </form>
    </div>
</body>

</html>