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
</body>

    <footer id="contacto" class="bg-dark text-white py-5">
        <div class="container text-center">
            <h5 class="mb-3">📚 LibrosWap — Compartiendo conocimiento desde 2025</h5>
            <p class="mb-3">Diseñado con 💜 LIBROS WAP</p>
            <div class="d-flex justify-content-center gap-4 mb-3">
                <a href="#" class="text-white text-decoration-none">Inicio</a>
                <a href="#" class="text-white text-decoration-none">Libros</a>
                <a href="#" class="text-white text-decoration-none">Blog</a>
                <a href="#" class="text-white text-decoration-none">Contacto</a>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <i class="bi bi-facebook fs-5"></i>
                <i class="bi bi-instagram fs-5"></i>
                <i class="bi bi-twitter fs-5"></i>
            </div>
            <p class="mt-4 small">© 2025 LibrosWap. Todos los derechos reservados.</p>
        </div>
    </footer>