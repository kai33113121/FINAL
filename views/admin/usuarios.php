<h2 class="mb-4">👥 Gestión de usuarios</h2>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= $u['rol'] ?></td>
                <td>
                    <a href="index.php?c=AdminController&a=editarUsuario&id=<?= $u['id'] ?>"
                        class="btn btn-outline-purple btn-sm">Editar</a>
                    <a href="index.php?c=AdminController&a=eliminarUsuario&id=<?= $u['id'] ?>"
                        class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>