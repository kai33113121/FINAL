<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --purple: #6a11cb;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card-epic:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(106, 17, 203, 0.15);
    }

    .btn-custom-purple {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-custom-purple::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gradient-secondary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-custom-purple:hover::before {
        opacity: 1;
    }

    .btn-custom-purple:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(106, 17, 203, 0.3);
        color: white;
    }

    .btn-custom-purple * {
        position: relative;
        z-index: 2;
    }

    .form-control,
    .form-select {
        border-radius: 15px;
        border: 2px solid #e9ecef;
        padding: 12px 20px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
    }

    .form-label {
        font-weight: 600;
        color: var(--purple);
        margin-bottom: 8px;
    }

    .profile-image-preview {
        border-radius: 15px;
        border: 3px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .profile-image-preview:hover {
        transform: scale(1.05);
    }

    .optional-badge {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #8b4513;
        font-size: 0.75rem;
        padding: 2px 8px;
        border-radius: 10px;
        font-weight: 500;
        margin-left: 8px;
    }

    .section-title-epic {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-align: center;
        margin-bottom: 2rem;
    }
</style>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-epic">
                <div class="card-body p-5">

                    <h2 class="section-title-epic">👤 Mi perfil</h2>

                    <form method="POST" enctype="multipart/form-data"
                        action="index.php?c=UsuarioController&a=actualizarPerfil">

                        <div class="row g-4">

                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-person me-2"></i>Nombre
                                </label>
                                <input type="text" name="nombre" class="form-control"
                                    value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-envelope me-2"></i>Email
                                </label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= htmlspecialchars($usuario['email']) ?>" required>
                            </div>

                            <!-- Biografía -->
                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-journal-text me-2"></i>Biografía
                                </label>
                                <textarea name="bio" class="form-control" rows="4"
                                    placeholder="Cuéntanos sobre ti..."><?= htmlspecialchars($usuario['bio']) ?></textarea>
                            </div>

                            <!-- Dirección -->
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-geo-alt me-2"></i>Dirección
                                    <span class="optional-badge">Opcional</span>
                                </label>
                                <input type="text" name="direccion" class="form-control"
                                    value="<?= htmlspecialchars($usuario['direccion'] ?? '') ?>"
                                    placeholder="Tu dirección">
                            </div>

                            <!-- Género Preferido -->
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

                            <!-- Libro Favorito -->
                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-book-heart me-2"></i>Libro Favorito
                                    <span class="optional-badge">Opcional</span>
                                </label>
                                <input type="text" name="libro_favorito" class="form-control"
                                    value="<?= htmlspecialchars($usuario['libro_favorito'] ?? '') ?>"
                                    placeholder="Tu libro favorito">
                            </div>

                            <!-- Foto de perfil -->
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

                            <!-- Botón -->
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