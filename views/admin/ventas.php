<h2 class="mb-4 text-purple"><i class="bi bi-cart-check"></i> Libros en venta por usuarios</h2>

<div class="table-responsive">
    <table id="tablaVentas" class="table table-bordered table-hover align-middle">
        <thead class="table-purple text-white">
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($librosEnVenta as $libro): ?>
                <tr>
                    <td><img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" width="60" alt="Libro"></td>
                    <td><?= htmlspecialchars($libro['titulo']) ?></td>
                    <td><?= htmlspecialchars($libro['autor']) ?></td>
                    <td><?= htmlspecialchars($libro['descripcion']) ?></td>
                    <td>$<?= number_format($libro['precio'], 2) ?></td>
                    <td>
                        <span class="badge <?= $libro['estado'] === 'nuevo' ? 'bg-success' : 'bg-warning' ?>">
                            <?= ucfirst($libro['estado']) ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($libro['id']) ?></td>
                    <td>
                        <a href="index.php?c=AdminController&a=editarVenta&id=<?= $libro['id'] ?>"
                            class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="index.php?c=AdminController&a=eliminarVenta&id=<?= $libro['id'] ?>"
                            class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este libro?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>