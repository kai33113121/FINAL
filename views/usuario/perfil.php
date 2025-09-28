<link rel="stylesheet" href="public/css/perfil.css">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-epic">
                <div class="card-body p-5">
                    <h2 class="section-title-epic">👤 Mi perfil</h2>
                    <form method="POST" enctype="multipart/form-data"
                        action="index.php?c=UsuarioController&a=actualizarPerfil">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-person me-2"></i>Nombre
                                </label>
                                <input type="text" name="nombre" class="form-control"
                                    value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-envelope me-2"></i>Email
                                </label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= htmlspecialchars($usuario['email']) ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-journal-text me-2"></i>Biografía
                                </label>
                                <textarea name="bio" class="form-control" rows="4"
                                    placeholder="Cuéntanos sobre ti..."><?= htmlspecialchars($usuario['bio']) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-geo-alt me-2"></i>Dirección
                                    <span class="optional-badge">Opcional</span>
                                </label>
                                <input type="text" name="direccion" class="form-control"
                                    value="<?= htmlspecialchars($usuario['direccion'] ?? '') ?>"
                                    placeholder="Tu dirección">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-bookmark-heart me-2"></i>Género Literario Favorito
                                    <span class="optional-badge">Opcional</span>
                                </label>
                                <select name="genero_preferido" class="form-select">
                                    <option value="">Selecciona tu género favorito</option>
                                    <option value="Fantasía" <?= ($usuario['genero_preferido'] ?? '') === 'Fantasía' ? 'selected' : '' ?>>Fantasía</option>
                                    <option value="Ciencia Ficción" <?= ($usuario['genero_preferido'] ?? '') === 'Ciencia Ficción' ? 'selected' : '' ?>>Ciencia Ficción</option>
                                    <option value="Romance" <?= ($usuario['genero_preferido'] ?? '') === 'Romance' ? 'selected' : '' ?>>Romance</option>
                                    <option value="Thriller" <?= ($usuario['genero_preferido'] ?? '') === 'Thriller' ? 'selected' : '' ?>>Thriller</option>
                                    <option value="Misterio" <?= ($usuario['genero_preferido'] ?? '') === 'Misterio' ? 'selected' : '' ?>>Misterio</option>
                                    <option value="No Ficción" <?= ($usuario['genero_preferido'] ?? '') === 'No Ficción' ? 'selected' : '' ?>>No Ficción</option>
                                    <option value="Clásicos" <?= ($usuario['genero_preferido'] ?? '') === 'Clásicos' ? 'selected' : '' ?>>Clásicos</option>
                                    <option value="Juvenil" <?= ($usuario['genero_preferido'] ?? '') === 'Juvenil' ? 'selected' : '' ?>>Juvenil</option>
                                    <option value="Aventura" <?= ($usuario['genero_preferido'] ?? '') === 'Aventura' ? 'selected' : '' ?>>Aventura</option>
                                    <option value="Otro" <?= ($usuario['genero_preferido'] ?? '') === 'Otro' ? 'selected' : '' ?>>Otro</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-book-heart me-2"></i>Libro Favorito
                                    <span class="optional-badge">Opcional</span>
                                </label>
                                <input type="text" name="libro_favorito" class="form-control"
                                    value="<?= htmlspecialchars($usuario['libro_favorito'] ?? '') ?>"
                                    placeholder="Tu libro favorito">
                            </div>
                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-camera me-2"></i>Foto de perfil
                                </label>
                                <input type="file" name="foto" class="form-control mb-3">
                                <?php if (!empty($usuario['foto'])): ?>
                                    <div class="text-center">
                                        <img src="public/img/usuarios/<?= $usuario['foto'] ?>" alt="Foto actual"
                                            class="profile-image-preview"
                                            style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                        <p class="text-muted mt-2 small">Foto actual</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="bi bi-check-circle me-2"></i>Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>