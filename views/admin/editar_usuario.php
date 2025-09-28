<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/editar_usuario.css">
</head>
<body>
    <div class="container-fluid user-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card user-card bg-overlay">
                    <div class="user-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-user-edit user-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">✏️ Editar Usuario</h2>
                                <p class="mb-0 opacity-75">Modifica la información del usuario</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <form method="POST" action="index.php?c=AdminController&a=guardarUsuario">
                            <input type="hidden" name="id" value="<?= $datos['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user me-2 text-muted"></i>Nombre</label>
                                <input type="text" name="nombre" class="form-control"
                                    value="<?= htmlspecialchars($datos['nombre']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-envelope me-2 text-muted"></i>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= htmlspecialchars($datos['email']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user-shield me-2 text-muted"></i>Rol</label>
                                <select name="rol" class="form-control">
                                    <option value="usuario" <?= $datos['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario
                                    </option>
                                    <option value="admin" <?= $datos['rol'] === 'admin' ? 'selected' : '' ?>>Administrador
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label"><i
                                        class="fas fa-align-left me-2 text-muted"></i>Biografía</label>
                                <textarea name="bio" class="form-control"
                                    rows="4"><?= htmlspecialchars($datos['bio']) ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-custom-purple btn-lg">
                                    <i class="fas fa-save me-2"></i>Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>