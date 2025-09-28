<link rel="stylesheet" href="public/css/mis_ventas.css">
<div class="libros-container">
    <div class="container mt-4">
        <div class="hero-libros">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="section-title-epic">
                            <i class="bi bi-book me-3"></i>Mis Libros Publicados
                        </h1>
                        <p class="lead">Gestiona tu biblioteca personal y comparte conocimiento con la comunidad</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number"><?= count($libros) ?></div>
                    <div>Libros Publicados</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $nuevos = 0;
                        foreach ($libros as $libro) {
                            if (trim(strtolower($libro['estado'] ?? '')) === 'nuevo')
                                $nuevos++;
                        }
                        echo $nuevos;
                        ?>
                    </div>
                    <div>Nuevos</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $usados = 0;
                        foreach ($libros as $libro) {
                            if (trim(strtolower($libro['estado'] ?? '')) === 'usado')
                                $usados++;
                        }
                        echo $usados;
                        ?>
                    </div>
                    <div>Usados</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $total_valor = 0;
                        foreach ($libros as $libro) {
                            $total_valor += $libro['precio'] ?? 0;
                        }
                        echo '$' . number_format($total_valor, 0);
                        ?>
                    </div>
                    <div>Valor Total</div>
                </div>
            </div>
        </div>
        <div class="card-epic">
            <div class="card-body p-4">
                <div class="row">
                    <?php if (!empty($libros)): ?>
                        <?php foreach ($libros as $libro): ?>
                            <div class="col-lg-4 col-md-6 mb-4 libro-item">
                                <div class="libro-card">
                                    <img src="public/img/libros/<?= htmlspecialchars($libro['imagen']) ?>"
                                        class="libro-image w-100" alt="<?= htmlspecialchars($libro['titulo']) ?>">
                                    <div class="card-body p-4">
                                        <h5 class="libro-titulo"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                        <p class="libro-autor">
                                            <i class="bi bi-person me-1"></i>
                                            <?= htmlspecialchars($libro['autor']) ?>
                                        </p>
                                        <p class="libro-descripcion"><?= htmlspecialchars($libro['descripcion']) ?></p>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="precio-badge">
                                                $<?= number_format($libro['precio'], 2) ?>
                                            </span>
                                            <?php if (!empty($libro['estado'])): ?>
                                                <?php
                                                $estadoTexto = htmlspecialchars($libro['estado']);
                                                $estadoClass = (strtolower($estadoTexto) === 'nuevo') ? 'estado-nuevo' : 'estado-usado';
                                                ?>
                                                <span class="estado-badge <?= $estadoClass ?>">
                                                    <?= ucfirst($estadoTexto) ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="index.php?c=VentaController&a=editarVista&id=<?= $libro['id'] ?>"
                                                class="btn-editar flex-fill text-center">
                                                <i class="bi bi-pencil-square me-1"></i>Editar
                                            </a>
                                            <a href="index.php?c=VentaController&a=eliminar&id=<?= $libro['id'] ?>"
                                                class="btn-eliminar flex-fill text-center"
                                                onclick="return confirm('¿Estás seguro de eliminar este libro?');">
                                                <i class="bi bi-trash me-1"></i>Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="empty-state">
                                <i class="bi bi-book-half"></i>
                                <h4 class="text-purple">No has publicado ningún libro aún</h4>
                                <p>Comparte tus libros con la comunidad y comienza a generar intercambios</p>
                                <a href="index.php?c=VentaController&a=crearVista" class="btn-publicar">
                                    <i class="bi bi-upload me-2"></i>Publicar primer libro
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <?php if (!empty($libros)): ?>
                    <a href="index.php?c=VentaController&a=crearVista" class="btn-publicar">
                        <i class="bi bi-plus-circle me-2"></i>Publicar otro libro
                    </a>
                <?php endif; ?>
                <a href="index.php?c=UsuarioController&a=dashboard" class="btn-volver">
                    <i class="bi bi-arrow-left-circle me-2"></i>Volver al dashboard
                </a>
            </div>
        </div>
        <?php if (!empty($libros)): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-epic">
                        <div class="card-body p-5 text-center">
                            <h3
                                style="background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 800;">
                                Consejos para Vender Más
                            </h3>
                            <div class="row g-4 mt-3">
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-camera text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Buenas Fotos</h5>
                                        <p class="text-muted">Usa imágenes claras y bien iluminadas de tus libros</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-pencil-square text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Descripción Detallada</h5>
                                        <p class="text-muted">Incluye el estado real y detalles importantes del libro</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-tags text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Precio Justo</h5>
                                        <p class="text-muted">Investiga precios similares para ser competitivo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>