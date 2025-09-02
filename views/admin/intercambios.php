<h2 class="mb-4">🔄 Gestión de intercambios</h2>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Ofrecido por</th>
            <th>Libro ofrecido</th>
            <th>Solicitado a</th>
            <th>Libro solicitado</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($intercambios as $i): ?>
            <tr>
                <td><?= $i['id'] ?></td>
                <td><?= htmlspecialchars($i['nombre_ofrece']) ?></td>
                <td><?= htmlspecialchars($i['libro_ofrecido']) ?></td>
                <td><?= htmlspecialchars($i['nombre_recibe']) ?></td>
                <td><?= htmlspecialchars($i['libro_solicitado']) ?></td>
                <td><?= $i['estado'] ?></td>
                <td><?= $i['fecha'] ?></td>
                <td>
                    <a href="index.php?c=AdminController&a=eliminarIntercambio&id=<?= $i['id'] ?>"
                        class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>