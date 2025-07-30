<h2 class="mb-4">📚 Gestión de libros</h2>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?= $libro['id'] ?></td>
                <td><?= htmlspecialchars($libro['titulo']) ?></td>
                <td><?= htmlspecialchars($libro['autor']) ?></td>
                <td><?= htmlspecialchars($libro['nombre_usuario']) ?></td>
                <td><?= htmlspecialchars($libro['estado']) ?></td>
                <td>
                    <a href="index.php?c=AdminController&a=editarLibro&id=<?= $libro['id'] ?>"
                        class="btn btn-outline-purple btn-sm">Editar</a>
                    <a href="index.php?c=AdminController&a=eliminarLibro&id=<?= $libro['id'] ?>"
                        class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="index.php?c=AdminController&a=subirLibro">Subir libro</a>