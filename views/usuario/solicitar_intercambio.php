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
            <input type="hidden" name="usuario_2" value="<?= htmlspecialchars($libroSolicitado['id_usuario']) ?>">

            <div class="mb-3">
                <label>Selecciona uno de tus libros para ofrecer:</label>
                <?php if (!empty($misLibros)): ?>
                    <select name="libro_id_1" class="form-control" required>
                        <?php foreach ($misLibros as $libro): ?>
                            <option value="<?= $libro['id'] ?>"><?= $libro['titulo'] ?> - <?= $libro['autor'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else: ?>
                    <div class="alert alert-warning mt-2">
                        No tienes libros disponibles para intercambiar.
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-success" <?= empty($misLibros) ? 'disabled' : '' ?>>Enviar solicitud</button>
        </form>
    </div>
    <?php if (isset($_GET['exito']) && $_GET['exito'] == '1'): ?>
        <script>
            alert('✅ Solicitud enviada correctamente.');
            window.location.href = 'index.php?c=LibroController&a=explorar';
        </script>
    <?php endif; ?>
</body>
</html>