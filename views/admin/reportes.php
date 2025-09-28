<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes Generales - Admin</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/reportes.css">
</head>
<body>
  <div class="container-fluid reports-container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card reports-card bg-overlay">
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
          <div class="card-body p-4">
            <h4 class="section-title">👥 Usuarios registrados</h4>
            <table id="tablaUsuarios" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Fecha Registro</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['usuarios'])): ?>
                  <?php foreach ($reportes['usuarios'] as $u): ?>
                    <tr>
                      <td><?= $u['id'] ?></td>
                      <td><?= htmlspecialchars($u['nombre']) ?></td>
                      <td><?= htmlspecialchars($u['email']) ?></td>
                      <td><span class="badge bg-primary"><?= $u['rol'] ?></span></td>
                      <td><?= isset($u['created_at']) ? date('d M Y', strtotime($u['created_at'])) : 'N/A' ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <h4 class="section-title">📚 Libros Oficiales</h4>
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
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['libros'])): ?>
                  <?php foreach ($reportes['libros'] as $l): ?>
                    <tr>
                      <td><?= $l['id'] ?></td>
                      <td><?= htmlspecialchars($l['titulo']) ?></td>
                      <td><?= htmlspecialchars($l['autor']) ?></td>
                      <td><?= htmlspecialchars($l['genero']) ?></td>
                      <td>$<?= number_format($l['precio'] ?? 0, 2) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <h4 class="section-title">📖 Libros de Usuarios</h4>
            <table id="tablaLibrosVenta" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Autor</th>
                  <th>Estado</th>
                  <th>Precio</th>
                  <th>Usuario</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['libros_venta'])): ?>
                  <?php foreach ($reportes['libros_venta'] as $lv): ?>
                    <tr>
                      <td><?= $lv['id'] ?></td>
                      <td><?= htmlspecialchars($lv['titulo']) ?></td>
                      <td><?= htmlspecialchars($lv['autor']) ?></td>
                      <td><span class="badge bg-info"><?= ucfirst($lv['estado']) ?></span></td>
                      <td>$<?= number_format($lv['precio'] ?? 0, 2) ?></td>
                      <td><?= htmlspecialchars($lv['nombre_usuario'] ?? 'Usuario eliminado') ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <h4 class="section-title">💰 Compras</h4>
            <div class="filter-section">
              <form class="row mb-3" method="GET" action="index.php">
                <input type="hidden" name="c" value="AdminController">
                <input type="hidden" name="a" value="reportes">
                <div class="col-md-3">
                  <select name="estado_compra" class="form-control">
                    <option value="">Todos los estados</option>
                    <option value="pendiente" <?= ($_GET['estado_compra'] ?? '') === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="completado" <?= ($_GET['estado_compra'] ?? '') === 'completado' ? 'selected' : '' ?>>Completado</option>
                    <option value="cancelado" <?= ($_GET['estado_compra'] ?? '') === 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <input type="date" name="fecha_compra" class="form-control"
                    value="<?= htmlspecialchars($_GET['fecha_compra'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-custom-purple w-100">Filtrar compras</button>
                </div>
              </form>
            </div>
            <table id="tablaCompras" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['compras'])): ?>
                  <?php foreach ($reportes['compras'] as $c): ?>
                    <tr>
                      <td><?= $c['id'] ?></td>
                      <td><?= htmlspecialchars($c['nombre_usuario'] ?? 'Usuario eliminado') ?></td>
                      <td>$<?= number_format($c['total'], 2) ?></td>
                      <td>
                        <span class="badge badge-<?= $c['estado'] ?>">
                          <?= ucfirst($c['estado']) ?>
                        </span>
                      </td>
                      <td><?= date('d M Y H:i', strtotime($c['fecha'])) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <h4 class="section-title">📋 Detalle de Compras</h4>
            <table id="tablaDetalleCompras" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Compra ID</th>
                  <th>Libro</th>
                  <th>Cantidad</th>
                  <th>Precio Unit.</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['detalle_compras'])): ?>
                  <?php foreach ($reportes['detalle_compras'] as $dc): ?>
                    <tr>
                      <td><?= $dc['id'] ?></td>
                      <td><?= $dc['compra_id'] ?></td>
                      <td><?= htmlspecialchars($dc['titulo'] ?? 'Libro no disponible') ?></td>
                      <td><?= $dc['cantidad'] ?></td>
                      <td>$<?= number_format($dc['precio'], 2) ?></td>
                      <td>$<?= number_format($dc['precio'] * $dc['cantidad'], 2) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
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
                    <option value="pendiente" <?= ($_GET['estado_intercambio'] ?? '') === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="aceptado" <?= ($_GET['estado_intercambio'] ?? '') === 'aceptado' ? 'selected' : '' ?>>Aceptado</option>
                    <option value="rechazado" <?= ($_GET['estado_intercambio'] ?? '') === 'rechazado' ? 'selected' : '' ?>>Rechazado</option>
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
                  <th>Solicitante</th>
                  <th>Propietario</th>
                  <th>Libro Ofrecido</th>
                  <th>Libro Solicitado</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['intercambios'])): ?>
                  <?php foreach ($reportes['intercambios'] as $i): ?>
                    <tr>
                      <td><?= $i['id'] ?></td>
                      <td><?= htmlspecialchars($i['nombre_solicitante'] ?? 'Usuario eliminado') ?></td>
                      <td><?= htmlspecialchars($i['nombre_propietario'] ?? 'Usuario eliminado') ?></td>
                      <td><?= htmlspecialchars($i['libro_ofrecido'] ?? 'Libro no disponible') ?></td>
                      <td><?= htmlspecialchars($i['libro_solicitado'] ?? 'Libro no disponible') ?></td>
                      <td>
                        <span class="badge badge-<?= $i['estado'] ?>">
                          <?= ucfirst($i['estado']) ?>
                        </span>
                      </td>
                      <td><?= date('d M Y', strtotime($i['fecha'])) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
            <h4 class="section-title">⭐ Reseñas</h4>
            <table id="tablaResenas" class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Libro</th>
                  <th>Calificación</th>
                  <th>Comentario</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reportes['resenas'])): ?>
                  <?php foreach ($reportes['resenas'] as $r): ?>
                    <tr>
                      <td><?= $r['id'] ?></td>
                      <td><?= htmlspecialchars($r['nombre_usuario'] ?? 'Usuario eliminado') ?></td>
                      <td><?= htmlspecialchars($r['titulo_libro'] ?? 'Libro no disponible') ?></td>
                      <td>
                        <span class="badge bg-warning text-dark">
                          <?= $r['calificacion'] ?> ⭐
                        </span>
                      </td>
                      <td><?= htmlspecialchars(substr($r['comentario'], 0, 50)) ?>...</td>
                      <td><?= date('d M Y', strtotime($r['fecha'])) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>