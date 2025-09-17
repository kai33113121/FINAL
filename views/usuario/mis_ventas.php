<!-- Estilos para mis libros épicos -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --purple: #6a11cb;
    }

    .libros-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-libros {
        background: var(--gradient-primary);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 40px;
    }

    .hero-libros::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-libros * {
        position: relative;
        z-index: 2;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .libro-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border: none;
        border-radius: 15px;
        transition: all 0.4s ease;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .libro-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .libro-card:hover::before {
        opacity: 0.05;
    }

    .libro-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(106, 17, 203, 0.2);
    }

    .libro-card * {
        position: relative;
        z-index: 2;
    }

    .libro-image {
        height: 250px;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
        transition: all 0.3s ease;
    }

    .libro-card:hover .libro-image {
        transform: scale(1.05);
    }

    .stats-mini {
        background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        margin-bottom: 30px;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: var(--purple);
    }

    .section-title-epic {
        font-size: 2.5rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
    }

    .btn-editar {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple);
        color: var(--purple);
        border-radius: 25px;
        padding: 8px 16px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.85rem;
    }

    .btn-editar:hover {
        background: var(--purple);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
    }

    .btn-eliminar {
        background: var(--gradient-secondary);
        border: none;
        color: white;
        border-radius: 25px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.85rem;
    }

    .btn-eliminar:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(240, 147, 251, 0.4);
        color: white;
    }

    .btn-publicar {
        background: var(--gradient-primary);
        border: none;
        color: white;
        border-radius: 25px;
        padding: 15px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-publicar:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(106, 17, 203, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-volver {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple);
        color: var(--purple);
        border-radius: 25px;
        padding: 12px 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-volver:hover {
        background: var(--purple);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
    }

    .precio-badge {
        background: var(--gradient-tertiary);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 1rem;
        display: inline-block;
        margin-bottom: 10px;
    }

    .estado-badge {
        padding: 6px 12px;
        border-radius: 15px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .estado-nuevo {
        background: linear-gradient(135deg, #d4f5d4 0%, #90ee90 100%);
        color: #006400;
    }

    .estado-usado {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #8b4513;
    }

    .libro-titulo {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--purple);
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .libro-autor {
        color: #666;
        font-size: 1rem;
        margin-bottom: 15px;
        font-style: italic;
    }

    .libro-descripcion {
        color: #555;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 5rem;
        color: var(--purple);
        margin-bottom: 30px;
        opacity: 0.5;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .libro-item {
        animation: fadeInUp 0.6s ease;
    }

    .libro-item:nth-child(2) {
        animation-delay: 0.1s;
    }

    .libro-item:nth-child(3) {
        animation-delay: 0.2s;
    }

    .libro-item:nth-child(4) {
        animation-delay: 0.3s;
    }
</style>

<div class="libros-container">
    <div class="container mt-4">

        <!-- Hero Section -->
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

        <!-- Estadísticas -->
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

        <!-- Lista de Libros -->
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

        <!-- Botones de acción -->
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

        <!-- Consejos -->
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