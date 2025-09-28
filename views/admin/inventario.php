<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/inventario.css">
</head>
<body>
    <div class="container-fluid inventory-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card inventory-card bg-overlay">
                    <div class="inventory-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-boxes inventory-icon"></i>
                            </div>
                            <div class="col-md-8 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📦 Gestión de Inventario</h2>
                                <p class="mb-0 opacity-75">Control de stock, este apartado es solo un conteo u organizador de notas del usaurio administrativo, no incluye datos de la base de datos. es un calculador y controlador de stock</p>
                            </div>
                            <div class="col-md-2 text-center">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarItem">
                                    <i class="fas fa-plus me-2"></i>Agregar Item
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="stats-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <h5>Total Items</h5>
                                    <h3><?= count($items) ?></h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                    <h5>Stock Bajo</h5>
                                    <h3><?= count(array_filter($items, fn($i) => ($i['nivel_stock'] ?? '') === 'Bajo')) ?></h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <h5>Stock Normal</h5>
                                    <h3><?= count(array_filter($items, fn($i) => ($i['nivel_stock'] ?? '') === 'Normal')) ?></h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                    <h5>Valor Total</h5>
                                    <h3>$<?= number_format(array_sum(array_map(fn($i) => ($i['precio_venta'] ?? 0) * ($i['stock_actual'] ?? 0), $items))) ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php if (empty($items)): ?>
                            <div class="empty-state">
                                <i class="fas fa-box-open"></i>
                                <h5 class="mt-3 mb-2">No hay items en el inventario</h5>
                                <p class="text-muted">Agrega tu primer item para comenzar</p>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarItem">
                                    <i class="fas fa-plus me-2"></i>Agregar Primer Item
                                </button>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-custom table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ISBN</th>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th>Género</th>
                                            <th>Stock</th>
                                            <th>Precio Compra</th>
                                            <th>Precio Venta</th>
                                            <th>Estado Stock</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($items as $item): ?>
                                        <tr>
                                            <td><span class="item-isbn"><?= htmlspecialchars($item['isbn'] ?? 'N/A') ?></span></td>
                                            <td>
                                                <div class="item-title">
                                                    <i class="fas fa-book me-2 text-muted"></i>
                                                    <?= htmlspecialchars($item['titulo'] ?? '') ?>
                                                </div>
                                                <small class="text-muted"><?= htmlspecialchars(substr($item['descripcion'] ?? '', 0, 50)) ?>...</small>
                                            </td>
                                            <td class="item-author">
                                                <i class="fas fa-user-edit me-2 text-muted"></i>
                                                <?= htmlspecialchars($item['autor'] ?? '') ?>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary"><?= htmlspecialchars($item['genero'] ?? '') ?></span>
                                            </td>
                                            <td>
                                                <strong><?= $item['stock_actual'] ?? 0 ?></strong>
                                                <br><small class="text-muted">Min: <?= $item['stock_minimo'] ?? 0 ?></small>
                                            </td>
                                            <td>$<?= number_format($item['precio_compra'] ?? 0) ?></td>
                                            <td>$<?= number_format($item['precio_venta'] ?? 0) ?></td>
                                            <td>
                                                <?php 
                                                $nivel = $item['nivel_stock'] ?? 'Normal';
                                                $badgeClass = $nivel === 'Bajo' ? 'stock-bajo' : ($nivel === 'Alto' ? 'stock-alto' : 'stock-normal');
                                                ?>
                                                <span class="<?= $badgeClass ?>">
                                                    <i class="fas fa-<?= $nivel === 'Bajo' ? 'exclamation-triangle' : ($nivel === 'Alto' ? 'check-circle' : 'info-circle') ?> me-1"></i>
                                                    <?= $nivel ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-outline-purple btn-sm me-2" onclick="editarItem(<?= $item['id'] ?>)">
                                                    <i class="fas fa-edit me-1"></i>Editar
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" onclick="eliminarItem(<?= $item['id'] ?>)">
                                                    <i class="fas fa-trash me-1"></i>Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAgregarItem" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Nuevo Item al Inventario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="index.php?c=AdminController&a=guardarInventario" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="isbn" placeholder="978-0-123456-78-9">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Título *</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Autor *</label>
                                <input type="text" class="form-control" name="autor" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Género</label>
                                <select class="form-control" name="genero">
                                    <option>Ficción</option>
                                    <option>No ficción</option>
                                    <option>Romance</option>
                                    <option>Misterio</option>
                                    <option>Ciencia ficción</option>
                                    <option>Biografía</option>
                                    <option>Historia</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Precio de Compra</label>
                                <input type="number" step="0.01" class="form-control" name="precio_compra" value="0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Precio de Venta</label>
                                <input type="number" step="0.01" class="form-control" name="precio_venta" value="0">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Stock Actual</label>
                                <input type="number" class="form-control" name="stock_actual" value="0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stock Mínimo</label>
                                <input type="number" class="form-control" name="stock_minimo" value="5">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function editarItem(id) {
            alert('Función de edición en desarrollo');
        }
        function eliminarItem(id) {
            if (confirm('¿Estás seguro de eliminar este item?')) {
                window.location.href = `index.php?c=AdminController&a=eliminarInventario&id=${id}`;
            }
        }
    </script>
</body>
</html>