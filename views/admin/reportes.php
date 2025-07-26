<h2 class="mb-4">📄 Reportes generales</h2>

<!-- 📚 Libros publicados -->
<h4 class="mt-4">📚 Libros publicados</h4>

<!-- ✅ Formulario de filtros -->
<form class="row mb-3" method="GET" action="index.php">
  <input type="hidden" name="c" value="AdminController">
  <input type="hidden" name="a" value="reportes">

  <div class="col-md-3">
    <input type="text" name="autor" class="form-control" placeholder="Filtrar por autor" value="<?= htmlspecialchars($_GET['autor'] ?? '') ?>">
  </div>
  <div class="col-md-3">
    <input type="text" name="genero" class="form-control" placeholder="Filtrar por género" value="<?= htmlspecialchars($_GET['genero'] ?? '') ?>">
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

<!-- ✅ Tabla de libros con DataTables -->
<table id="tablaLibros" class="table table-bordered table-hover display" style="width:100%">
  <thead>
    <tr><th>ID</th><th>Título</th><th>Autor</th><th>Género</th><th>Estado</th><th>Usuario</th></tr>
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

<!-- 👥 Usuarios registrados -->
<h4 class="mt-4">👥 Usuarios registrados</h4>
<table id="tablaUsuarios" class="table table-bordered table-hover display" style="width:100%">
  <thead>
    <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th></tr>
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

<!-- 🔄 Intercambios -->
<!-- 🔄 Intercambios -->
<h4 class="mt-5">🔄 Intercambios</h4>

<!-- ✅ Formulario de filtros -->
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

<!-- ✅ Tabla de intercambios con DataTables -->
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
<!-- 💰 Ventas realizadas -->
<!-- 💰 Ventas realizadas -->
<h4 class="mt-5">💰 Ventas realizadas</h4>

<!-- ✅ Formulario de filtros -->
<form class="row mb-3" method="GET" action="index.php">
  <input type="hidden" name="c" value="AdminController">
  <input type="hidden" name="a" value="reportes">

  <div class="col-md-3">
    <input type="text" name="usuario_venta" class="form-control" placeholder="Filtrar por usuario" value="<?= htmlspecialchars($_GET['usuario_venta'] ?? '') ?>">
  </div>
  <div class="col-md-3">
    <input type="date" name="fecha_venta" class="form-control" value="<?= htmlspecialchars($_GET['fecha_venta'] ?? '') ?>">
  </div>
  <div class="col-md-3">
    <button type="submit" class="btn btn-custom-purple w-100">Filtrar ventas</button>
  </div>
</form>

<!-- ✅ Tabla de ventas con DataTables -->
<table id="tablaVentas" class="table table-bordered table-hover display" style="width:100%">
  <thead>
    <tr><th>ID</th><th>Usuario</th><th>Libro</th><th>Fecha</th></tr>
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