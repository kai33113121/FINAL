<link rel="stylesheet" href="public/css/intercambios.css">
<div class="intercambios-container">
    <div class="container mt-4">
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
        <div class="filter-buttons">
            <button class="filter-btn active" onclick="filterByStatus('all')">Todos</button>
            <button class="filter-btn" onclick="filterByStatus('aceptado')">Aceptados</button>
            <button class="filter-btn" onclick="filterByStatus('rechazado')">Rechazados</button>
        </div>
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
                                                <div class="intercambio-arrow">
                                                    <i class="bi bi-arrow-left-right"></i>
                                                </div>
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
    function filterByStatus(status) {
        const items = document.querySelectorAll('.intercambio-item');
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
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