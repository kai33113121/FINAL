<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LibrosWap Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/layout_a.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg shadow-sm px-4">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold text-purple">📚 LibrosWap Admin</span>
            <div class="dropdown ms-auto">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="perfilDropdown" title="Mi Perfil">
                    <img src="public/img/usuarios/<?= !empty($_SESSION['usuario']['foto']) ? htmlspecialchars($_SESSION['usuario']['foto']) : 'default.jpg' ?>"
                         alt="Perfil" class="rounded-circle profile-img me-2" width="38" height="38"
                         onerror="this.onerror=null;this.src='public/img/usuarios/default.jpg';">
                    <span class="text-white"><?= htmlspecialchars($_SESSION['usuario']['nombre'] ?? 'Admin') ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                    <li class="dropdown-header">
                        <i class="bi bi-person-circle fs-4 d-block mb-2"></i>
                        <strong><?= htmlspecialchars($_SESSION['usuario']['nombre'] ?? 'Admin') ?></strong>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="index.php?c=AdminController&a=perfil">
                            <i class="bi bi-person-gear me-2"></i>Mi Perfil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="index.php?c=AdminController&a=dashboard">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="index.php?c=UsuarioController&a=logout">
                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row g-0">
        <div class="col-md-2 sidebar">
            <div class="logo text-center mb-3">
                <img src="public/img/logow.png" alt="LibrosWap Logo" class="img-fluid" style="max-width: 100px;">
            </div>
            <h4 class="p-3">LIBROS WAP</h4>
            <a href="index.php?c=AdminController&a=dashboard">
                <i class="bi bi-speedometer2 me-2"></i> Inicio
            </a>
            <a href="index.php?c=AdminController&a=perfil">
                <i class="bi bi-person-circle me-2"></i> Perfil
            </a>
            <a href="index.php?c=AdminController&a=libros">
                <i class="bi bi-book me-2"></i> Libros
            </a>
            <a href="index.php?c=AdminController&a=compras">
                <i class="bi bi-bag-check me-2"></i> Compras
            </a>
            <a href="index.php?c=AdminController&a=ventas">
                <i class="bi bi-cart-check me-2"></i> Ventas
            </a>
            <a href="index.php?c=AdminController&a=inventario">
    <i class="bi bi-boxes me-2"></i> Control de Existencias
</a>
            <a href="index.php?c=AdminController&a=intercambios">
                <i class="bi bi-arrow-left-right me-2"></i> Intercambios
            </a>
            <a href="index.php?c=AdminController&a=usuarios">
                <i class="bi bi-people me-2"></i> Usuarios
            </a>
            <a href="index.php?c=AdminController&a=graficas">
                <i class="bi bi-bar-chart-line me-2"></i> Gráficas
            </a>
            <a href="index.php?c=AdminController&a=reportes">
                <i class="bi bi-file-earmark-text me-2"></i> Reportes
            </a>
            <a href="index.php?c=EventoController&a=guardar">
                <i class="bi bi-chat-dots me-2"></i> Crear foros
            </a>
            <a href="index.php?c=ResenaController&a=admin">
                <i class="bi bi-star-half me-2"></i> Panel de reseñas
            </a>
        </div>
        <div class="col-md-10 p-4">
            <?php include($contenido); ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            const opciones = {
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                }
            };
           if ($('#tablaLibros').length) $('#tablaLibros').DataTable(opciones);
if ($('#tablaUsuarios').length) $('#tablaUsuarios').DataTable(opciones);
if ($('#tablaIntercambios').length) $('#tablaIntercambios').DataTable(opciones);
if ($('#tablaVentas').length) $('#tablaVentas').DataTable(opciones);
if ($('#tablaInventario').length) $('#tablaInventario').DataTable(opciones);
if ($('#tablaLibrosVenta').length) $('#tablaLibrosVenta').DataTable(opciones);
if ($('#tablaCompras').length) $('#tablaCompras').DataTable(opciones);
if ($('#tablaDetalleCompras').length) $('#tablaDetalleCompras').DataTable(opciones);
if ($('#tablaResenas').length) $('#tablaResenas').DataTable(opciones);
        });
let tiempoInactivo = 0;
function reiniciarTiempo() { tiempoInactivo = 0; }
document.addEventListener('click', reiniciarTiempo);
document.addEventListener('mousemove', reiniciarTiempo);
document.addEventListener('keypress', reiniciarTiempo);
setInterval(function() {
    tiempoInactivo += 60000; 
    if (tiempoInactivo >= 1800000) { 
        alert('Sesión expirada por inactividad');
        window.location.href = 'index.php?c=UsuarioController&a=logout';
    }
}, 60000);
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        fetch('index.php?c=AdminController&a=dashboard')
            .then(response => {
                if (response.redirected) {
                    window.location.href = 'index.php?c=UsuarioController&a=login';
                }
            });
    }
});
    </script>
</body>
</html>