<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Intercambio - LibrosWap</title>
    <link rel="stylesheet" href="public/css/solicitar_in.css">
</head>
<body>
    <div class="intercambio-container">
        <div class="container">
            <div class="main-card">
                <div class="header-section">
                    <h1 class="header-title">
                        <i class="fas fa-exchange-alt"></i> Solicitar Intercambio
                    </h1>
                    <p class="header-subtitle">Intercambia uno de tus libros por el que te interesa</p>
                </div>
                <div class="content-section">
                    <?php if ($libroSolicitado): ?>
                        <div class="libro-solicitado">
                            <div class="libro-solicitado-title">
                                <i class="fas fa-book"></i> Libro que deseas
                            </div>
                            <div class="libro-solicitado-info">
                                <strong><?= htmlspecialchars($libroSolicitado['titulo']) ?></strong>
                                <?php if (!empty($libroSolicitado['autor'])): ?>
                                    <br>por <?= htmlspecialchars($libroSolicitado['autor']) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Libro no encontrado.
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?c=IntercambioController&a=enviarSolicitud" id="intercambioForm">
                        <input type="hidden" name="libro_id_2" value="<?= $libroSolicitado['id'] ?>">
                        <input type="hidden" name="usuario_2" value="<?= htmlspecialchars($libroSolicitado['id_usuario']) ?>">
                        <div class="form-section">
                            <label class="form-label">
                                <i class="fas fa-books"></i> Selecciona uno de tus libros para ofrecer:
                            </label>
                            <?php if (!empty($misLibros)): ?>
                                <div class="books-grid">
                                    <?php foreach ($misLibros as $libro): ?>
                                        <div class="book-option" onclick="selectBook(this, <?= $libro['id'] ?>)">
                                            <input type="radio" name="libro_id_1" value="<?= $libro['id'] ?>" id="libro_<?= $libro['id'] ?>" required>
                                            <div class="book-title"><?= htmlspecialchars($libro['titulo']) ?></div>
                                            <div class="book-author"><?= htmlspecialchars($libro['autor'] ?? 'Sin autor') ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <h4 style="color: var(--purple);">No tienes libros disponibles</h4>
                                    <p class="text-muted">Necesitas tener al menos un libro para poder intercambiar.</p>
                                    <a href="index.php?c=LibroController&a=crear" class="btn-submit" style="width: auto; padding: 10px 20px; margin-top: 15px;">
                                        <i class="fas fa-plus"></i> Agregar un libro
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($misLibros)): ?>
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Enviar solicitud de intercambio
                            </button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_GET['exito']) && $_GET['exito'] == '1'): ?>
        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i> ¡Solicitud enviada correctamente!
        </div>
        <script>
            setTimeout(function() {
                window.location.href = 'index.php?c=LibroController&a=explorar';
            }, 2000);
        </script>
    <?php endif; ?>
    <script>
        function selectBook(element, bookId) {
            document.querySelectorAll('.book-option').forEach(option => {
                option.classList.remove('selected');
            });
            element.classList.add('selected');
            document.getElementById('libro_' + bookId).checked = true;
        }
    </script>
</body>
</html>