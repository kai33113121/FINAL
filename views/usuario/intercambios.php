<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --purple: #6a11cb;
    }

    .intercambios-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-intercambios {
        background: var(--gradient-primary);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 40px;
    }

    .hero-intercambios::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-intercambios * {
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

    .intercambio-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border: none;
        border-radius: 15px;
        transition: all 0.4s ease;
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
    }

    .intercambio-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gradient-tertiary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .intercambio-card:hover::before {
        opacity: 0.05;
    }

    .intercambio-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(79, 172, 254, 0.2);
    }

    .intercambio-content {
        position: relative;
        z-index: 2;
        padding: 25px;
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

    .estado-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .estado-pendiente {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        color: #8b4513;
    }

    .estado-aceptado {
        background: linear-gradient(135deg, #d4f5d4 0%, #90ee90 100%);
        color: #006400;
    }

    .estado-rechazado {
        background: linear-gradient(135deg, #ffcccb 0%, #ff6b6b 100%);
        color: #8b0000;
    }

    .estado-completado {
        background: linear-gradient(135deg, #cce7ff 0%, #87ceeb 100%);
        color: #000080;
    }

    .intercambio-arrow {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: var(--gradient-tertiary);
        border-radius: 50%;
        color: white;
        font-size: 1.5rem;
        margin: 0 auto 20px;
    }

    .user-info {
        text-align: center;
        margin-bottom: 15px;
    }

    .user-name {
        font-weight: 700;
        color: var(--purple);
        font-size: 1.1rem;
    }

    .book-title {
        color: #333;
        font-weight: 600;
        margin-top: 5px;
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

    .filter-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .filter-btn {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple);
        color: var(--purple);
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--purple);
        color: white;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .intercambio-item {
        animation: fadeIn 0.5s ease;
    }
</style>

<div class="intercambios-container">
    <div class="container mt-4">

        <!-- Hero Section -->
        <div class="hero-intercambios">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="section-title-epic">Mis Intercambios</h1>
                        <p class="lead">Gestiona todos tus intercambios de libros de forma inteligente</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Estadísticas -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number"><?= count($intercambios) ?></div>
                    <div>Total Intercambios</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $aceptados = 0;
                        foreach ($intercambios as $i) {
                            if (trim($i['estado']) === 'aceptado') {
                                $aceptados++;
                            }
                        }
                        echo $aceptados;
                        ?>
                    </div>
                    <div>Aceptados</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $rechazados = 0;
                        foreach ($intercambios as $i) {
                            if (trim($i['estado']) === 'rechazado') {
                                $rechazados++;
                            }
                        }
                        echo $rechazados;
                        ?>
                    </div>
                    <div>Rechazados</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-mini">
                    <div class="stat-number">
                        <?php
                        $exito = count($intercambios) > 0 ? round(($aceptados / count($intercambios)) * 100) : 0;
                        echo $exito . '%';
                        ?>
                    </div>
                    <div>Tasa de Éxito</div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filter-buttons">
            <button class="filter-btn active" onclick="filterByStatus('all')">Todos</button>
            <button class="filter-btn" onclick="filterByStatus('aceptado')">Aceptados</button>
            <button class="filter-btn" onclick="filterByStatus('rechazado')">Rechazados</button>
        </div>

        <!-- Lista de Intercambios -->
        <div class="row">
            <div class="col-12">
                <div class="card-epic">
                    <div class="card-body p-4">

                        <?php if (!empty($intercambios)): ?>
                            <div class="row g-4" id="intercambiosList">
                                <?php foreach ($intercambios as $i): ?>
                                    <div class="col-lg-6 intercambio-item" data-estado="<?= $i['estado'] ?>">
                                        <div class="intercambio-card">
                                            <div class="intercambio-content">

                                                <!-- Flecha de intercambio -->
                                                <div class="intercambio-arrow">
                                                    <i class="bi bi-arrow-left-right"></i>
                                                </div>

                                                <!-- Información del intercambio -->
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="user-info">
                                                            <div class="user-name"><?= htmlspecialchars($i['nombre_ofrece']) ?>
                                                            </div>
                                                            <small class="text-muted">Ofrece</small>
                                                            <div class="book-title">
                                                                <?= htmlspecialchars($i['libro_ofrecido']) ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-2 text-center d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-arrow-right text-purple fs-3"></i>
                                                    </div>

                                                    <div class="col-5">
                                                        <div class="user-info">
                                                            <div class="user-name"><?= htmlspecialchars($i['nombre_recibe']) ?>
                                                            </div>
                                                            <small class="text-muted">Recibe</small>
                                                            <div class="book-title">
                                                                <?= htmlspecialchars($i['libro_solicitado']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Estado y fecha -->
                                                <div
                                                    class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                                    <span class="estado-badge estado-<?= $i['estado'] ?>">
                                                        <?= ucfirst($i['estado']) ?>
                                                    </span>
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar3 me-1"></i>
                                                        <?= date('d M Y', strtotime($i['fecha'])) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="bi bi-arrow-left-right"></i>
                                <h4 class="text-purple">No tienes intercambios aún</h4>
                                <p>Comienza a intercambiar libros con otros usuarios de la comunidad</p>
                                <a href="index.php?c=LibroController&a=explorar" class="btn"
                                    style="background: var(--gradient-primary); color: white; border-radius: 25px; padding: 12px 25px; text-decoration: none;">
                                    <i class="bi bi-search me-2"></i>Explorar Libros
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consejos -->
        <?php if (!empty($intercambios)): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-epic">
                        <div class="card-body p-5 text-center">
                            <h3
                                style="background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 800;">
                                Consejos para Intercambios Exitosos
                            </h3>
                            <div class="row g-4 mt-3">
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-chat-dots text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Comunícate</h5>
                                        <p class="text-muted">Mantén conversaciones claras sobre el estado de los libros</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-clock text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Sé Puntual</h5>
                                        <p class="text-muted">Respeta los tiempos acordados para mantener tu reputación</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stats-mini">
                                        <i class="bi bi-star text-purple fs-1 mb-3"></i>
                                        <h5 class="fw-bold">Califica</h5>
                                        <p class="text-muted">Deja reseñas honestas para ayudar a la comunidad</p>
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

<script>
    // Función para filtrar intercambios por estado
    function filterByStatus(status) {
        const items = document.querySelectorAll('.intercambio-item');
        const buttons = document.querySelectorAll('.filter-btn');

        // Actualizar botones activos
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filtrar items
        items.forEach(item => {
            if (status === 'all' || item.getAttribute('data-estado') === status) {
                item.style.display = 'block';
                item.style.animation = 'fadeIn 0.3s ease';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>