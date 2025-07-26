<h2 class="mb-4">✏️ Editar usuario</h2>

<form method="POST" action="index.php?c=AdminController&a=guardarUsuario">
    <input type="hidden" name="id" value="<?= $datos['id'] ?>">

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($datos['nombre']) ?>"
            required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($datos['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Rol</label>
        <select name="rol" class="form-control">
            <option value="usuario" <?= $datos['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario</option>
            <option value="admin" <?= $datos['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Biografía</label>
        <textarea name="bio" class="form-control"><?= htmlspecialchars($datos['bio']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-custom-purple">Guardar cambios</button>
</form>