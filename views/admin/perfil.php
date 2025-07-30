<h2 class="mb-4">👤 Editar perfil</h2>

<form method="POST" enctype="multipart/form-data" action="index.php?c=AdminController&a=actualizarPerfil">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Biografía</label>
        <textarea name="bio" class="form-control"><?= htmlspecialchars($usuario['bio']) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Foto de perfil</label>
        <input type="file" name="foto" class="form-control">
        <?php if (!empty($usuario['foto'])): ?>
            <img src="public/img/usuarios/<?= $usuario['foto'] ?>" alt="Foto actual" class="mt-2" style="max-width: 150px;">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-custom-purple">Guardar cambios</button>
</form>