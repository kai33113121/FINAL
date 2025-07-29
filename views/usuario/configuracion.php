<h2 class="mb-4"><i class="bi bi-gear"></i> Configuración visual</h2>

<?php
// Evita errores si $config no está definido
$tema = $config['tema'] ?? 'claro';
$color = $config['color_acento'] ?? 'morado';
$vista = $config['vista_libros'] ?? 'grid';
$notificaciones = $config['notificaciones'] ?? true;
?>

<form method="POST" action="index.php?c=UsuarioController&a=guardarConfiguracion" class="card p-4 shadow-sm">
    <div class="mb-3">
        <label for="tema">Tema</label>
        <select name="tema" id="tema" class="form-select">
            <option value="claro" <?= $tema === 'claro' ? 'selected' : '' ?>>Claro</option>
            <option value="oscuro" <?= $tema === 'oscuro' ? 'selected' : '' ?>>Oscuro</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="color_acento">Color de acento</label>
        <select name="color_acento" id="color_acento" class="form-select">
            <option value="morado" <?= $color === 'morado' ? 'selected' : '' ?>>Morado</option>
            <option value="azul" <?= $color === 'azul' ? 'selected' : '' ?>>Azul</option>
            <option value="verde" <?= $color === 'verde' ? 'selected' : '' ?>>Verde</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="vista_libros">Vista de libros</label>
        <select name="vista_libros" id="vista_libros" class="form-select">
            <option value="grid" <?= $vista === 'grid' ? 'selected' : '' ?>>Cuadrícula</option>
            <option value="lista" <?= $vista === 'lista' ? 'selected' : '' ?>>Lista</option>
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="notificaciones" id="notificaciones" <?= $notificaciones ? 'checked' : '' ?>>
        <label class="form-check-label" for="notificaciones">Activar notificaciones emergentes</label>
    </div>

    <button type="submit" class="btn btn-outline-purple">Guardar preferencias</button>
</form>