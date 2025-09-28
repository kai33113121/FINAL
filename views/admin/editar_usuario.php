<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image:
                linear-gradient(135deg, rgba(87, 87, 87, 0.65) 0%, rgba(120, 107, 132, 0.85) 100%),
                url('/FINAL/public/img/sideadmin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .bg-overlay {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .user-container {
            padding: 2rem 0;
        }

        .user-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .user-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .user-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.98);
            padding: 2rem;
            border-radius: 15px;
            margin: 1rem;
            border: 1px solid rgba(78, 6, 97, 0.1);
        }

        .btn-custom-purple {
            background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-custom-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 6, 97, 0.3);
            color: white;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4e0661ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 6, 97, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #2f012eff;
            margin-bottom: 0.8rem;
        }

        @media (max-width: 768px) {
            .user-container {
                padding: 1rem 0;
            }

            .user-header {
                padding: 1.5rem;
            }

            .form-section {
                padding: 1.5rem;
                margin: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid user-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card user-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Formulario -->
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