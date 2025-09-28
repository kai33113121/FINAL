<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Admin</title>
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

        .profile-container {
            padding: 2rem 0;
        }

        .profile-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .profile-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .btn-custom {
            background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 6, 151, 0.3);
            color: white;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #44023aff;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.15);
        }

        .current-photo img {
            border-radius: 15px;
            border: 3px solid #e9ecef;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem 0;
            }

            .profile-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid profile-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card profile-card bg-overlay">
                    <!-- Header -->
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

                    <!-- Formulario -->
                    <div class="card-body p-4">
                        <form method="POST" enctype="multipart/form-data"
                            action="index.php?c=AdminController&a=actualizarPerfil">
                            <div class="row g-4">
                                <!-- Columna izquierda -->
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

                                <!-- Columna derecha -->
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

                                <!-- Botón centrado -->
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