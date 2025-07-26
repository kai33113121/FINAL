<section class="py-5 bg-light" id="libros-publicos">
    <div class="container">
        <h2 class="text-center text-purple fw-bold mb-4">📚 Libros disponibles</h2>

        <div id="librosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">

                <?php
                $chunked = array_chunk($libros, 3); // 3 libros por slide
                foreach ($chunked as $index => $grupo):
                    ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="row g-4 justify-content-center">
                            <?php foreach ($grupo as $libro): ?>
                                <div class="col-md-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <img src="/FINAL/public/img/<?= htmlspecialchars($libro['imagen']) ?>"
                                            class="card-img-top" alt="<?= htmlspecialchars($libro['titulo']) ?>">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-purple"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                            <p class="mb-1"><strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?></p>
                                            <p class="mb-1"><strong>Género:</strong> <?= htmlspecialchars($libro['genero']) ?>
                                            </p>
                                            <p class="mb-1"><strong>Modo:</strong> <?= htmlspecialchars($libro['modo']) ?></p>
                                            <?php if ($libro['modo'] === 'venta'): ?>
                                                <p class="mb-1"><strong>Precio:</strong> $<?= number_format($libro['precio'], 2) ?>
                                                </p>
                                            <?php endif; ?>
                                            <a href="index.php?c=LibroController&a=explorar"
                                                class="btn btn-outline-purple btn-sm mt-2">Explorar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#librosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#librosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>