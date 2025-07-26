<h3>✍️ Escribir reseña para: <?= htmlspecialchars($_GET['titulo']) ?></h3>

<form method="POST" action="index.php?c=ResenaController&a=agregar">
    <input type="hidden" name="libro_id" value="<?= $_GET['id'] ?>">

    <div class="mb-3">
        <label for="calificacion" class="form-label">Calificación</label>
        <select name="calificacion" class="form-select" required>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> ★</option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="comentario" class="form-label">Comentario</label>
        <textarea name="comentario" class="form-control" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-outline-purple">Guardar reseña</button>
</form>