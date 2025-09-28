<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/perfila.css">
</head>
<body>
    <div class="container-fluid profile-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card profile-card bg-overlay">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-user-edit profile-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">Editar Perfil</h2>
                                <p class="mb-0 opacity-75">Actualiza tu información personal</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" enctype="multipart/form-data"
                            action="index.php?c=AdminController&a=actualizarPerfil">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-user text-primary me-2"></i>Nombre
                                        </label>
                                        <input type="text" name="nombre" class="form-control"
                                            value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-envelope text-primary me-2"></i>Email
                                        </label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?= htmlspecialchars($usuario['email']) ?>" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-quote-left text-primary me-2"></i>Biografía
                                        </label>
                                        <textarea name="bio" class="form-control"
                                            rows="4"><?= htmlspecialchars($usuario['bio']) ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            <i class="fas fa-camera text-primary me-2"></i>Foto de perfil
                                        </label>
                                        <input type="file" name="foto" class="form-control" accept="image/*">
                                    </div>
                                    <?php if (!empty($usuario['foto'])): ?>
                                        <div class="text-center current-photo">
                                            <p class="text-muted mb-3">Foto actual:</p>
                                            <img src="public/img/usuarios/<?= $usuario['foto'] ?>" alt="Foto actual"
                                                class="img-fluid" style="max-width: 200px;">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <div class="text-center pt-3">
                                        <button type="submit" class="btn btn-custom btn-lg">
                                            <i class="fas fa-save me-2"></i>Guardar cambios
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>