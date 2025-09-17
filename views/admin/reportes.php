<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes Generales - Admin</title>
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

    .reports-container {
      padding: 2rem 0;
    }

    .reports-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .reports-header {
      background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
      color: white;
      padding: 2rem;
      text-align: center;
    }

    .reports-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      opacity: 0.9;
    }

    .section-title {
      background: linear-gradient(135deg, #4e0661ff 0%, #2f012eff 100%);
      color: white;
      padding: 1rem 1.5rem;
      margin: 2rem 0 1.5rem 0;
      border-radius: 12px;
      font-weight: 600;
    }

    .btn-custom-purple {
      background: linear-gradient(135deg, #4e0661ff 0%, #00a085 100%);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-custom-purple:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(78, 6, 97, 0.3);
      color: white;
    }

    .form-control {
      border: 2px solid #e9ecef;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #4e0661ff;
      box-shadow: 0 0 0 0.2rem rgba(78, 6, 97, 0.15);
    }

    .table {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      margin-bottom: 3rem;
    }

    .table thead th {
      background: linear-gradient(135deg, #2f012eff 0%, #4e0661ff 100%);
      color: white;
      border: none;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
      padding: 1rem;
    }

    .table-hover tbody tr:hover {
      background: rgba(78, 6, 97, 0.05);
    }

    .filter-section {
      background: rgba(255, 255, 255, 0.8);
      padding: 1.5rem;
      border-radius: 12px;
      margin-bottom: 1.5rem;
      border: 1px solid rgba(78, 6, 97, 0.1);
    }

    @media (max-width: 768px) {
      .reports-container {
        padding: 1rem 0;
      }

      .reports-header {
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid reports-container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card reports-card bg-overlay">
          <!-- Header -->
          <div class="reports-header">
            <div class="row align-items-center">
              <div class="col-md-2 text-center">
                <i class="fas fa-file-alt reports-icon"></i>
              </div>
              <div class="col-md-10 text-md-start text-center">
                <h2 class="mb-2 fw-bold">📄 Reportes Generales</h2>
                <p class="mb-0 opacity-75">Análisis detallado y exportación de datos del sistema</p>
              </div>
            </div>
          </div>

          <!-- Contenido -->
          <div class="card-body p-4">

            <h4 class="section-title">📚 Libros publicados</h4>


            <div class="filter-section">
              <form class="row mb-3" method="GET" action="index.php">
                <input type="hidden" name="c" value="AdminController">
                <input type="hidden" name="a" value="reportes">

                <div class="col-md-3">
                  <input type="text" name="autor" class="form-control" placeholder="Filtrar por autor"
                    value="<?= htmlspecialchars($_GET['autor'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                  <input type="text" name="genero" class="form-control" placeholder="Filtrar por género"
                    value="<?= htmlspecialchars($_GET['genero'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                  <select name="estado" class="form-control">
                    <option value="">Todos los estados</option>
                    <option value="nuevo" <?= ($_GET['estado'] ?? '') === 'nuevo' ? 'selected' : '' ?>>Nuevo</option>
                    <option value="usado" <?= ($_GET['estado'] ?? '') === 'usado' ? 'selected' : '' ?>>Usado</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-custom-purple w-100">Aplicar filtros</button>
                </div>
              </form>
            </div>


            <table id="tablaLibros" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Autor</th>
                  <th>Género</th>
                  <th>Estado</th>
                  <th>Usuario</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reportes['libros'] as $l): ?>
                  <tr>
                    <td><?= $l['id'] ?></td>
                    <td><?= htmlspecialchars($l['titulo']) ?></td>
                    <td><?= htmlspecialchars($l['autor']) ?></td>
                    <td><?= htmlspecialchars($l['genero']) ?></td>
                    <td><?= $l['estado'] ?></td>
                    <td><?= htmlspecialchars($l['nombre_usuario']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


            <h4 class="section-title">👥 Usuarios registrados</h4>
            <table id="tablaUsuarios" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Rol</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reportes['usuarios'] as $u): ?>
                  <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['nombre']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= $u['rol'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


            <h4 class="section-title">🔄 Intercambios</h4>


            <div class="filter-section">
              <form class="row mb-3" method="GET" action="index.php">
                <input type="hidden" name="c" value="AdminController">
                <input type="hidden" name="a" value="reportes">

                <div class="col-md-3">
                  <select name="estado_intercambio" class="form-control">
                    <option value="">Todos los estados</option>
                    <option value="pendiente" <?= ($_GET['estado_intercambio'] ?? '') === 'pendiente' ? 'selected' : '' ?>>
                      Pendiente</option>
                    <option value="aceptado" <?= ($_GET['estado_intercambio'] ?? '') === 'aceptado' ? 'selected' : '' ?>>
                      Aceptado</option>
                    <option value="rechazado" <?= ($_GET['estado_intercambio'] ?? '') === 'rechazado' ? 'selected' : '' ?>>
                      Rechazado</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-custom-purple w-100">Filtrar intercambios</button>
                </div>
              </form>
            </div>


            <table id="tablaIntercambios" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Ofrece</th>
                  <th>Solicita</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reportes['intercambios'] as $i): ?>
                  <tr>
                    <td><?= $i['id'] ?></td>
                    <td><?= htmlspecialchars($i['libro_ofrecido']) ?></td>
                    <td><?= htmlspecialchars($i['libro_solicitado']) ?></td>
                    <td><?= $i['estado'] ?></td>
                    <td><?= $i['fecha'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


            <h4 class="section-title">💰 Ventas realizadas</h4>


            <div class="filter-section">
              <form class="row mb-3" method="GET" action="index.php">
                <input type="hidden" name="c" value="AdminController">
                <input type="hidden" name="a" value="reportes">

                <div class="col-md-3">
                  <input type="text" name="usuario_venta" class="form-control" placeholder="Filtrar por usuario"
                    value="<?= htmlspecialchars($_GET['usuario_venta'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                  <input type="date" name="fecha_venta" class="form-control"
                    value="<?= htmlspecialchars($_GET['fecha_venta'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-custom-purple w-100">Filtrar ventas</button>
                </div>
              </form>
            </div>


            <table id="tablaVentas" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Libro</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reportes['ventas'] as $v): ?>
                  <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= htmlspecialchars($v['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($v['titulo_libro']) ?></td>
                    <td><?= $v['fecha'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

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