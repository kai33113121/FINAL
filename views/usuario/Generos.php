<!-- Estilos para géneros literarios -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        --purple: #6a11cb;
        --purple-light: #9c88ff;
    }

    .generos-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-generos {
        background: var(--gradient-primary);
        color: white;
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 50px;
    }

    .hero-generos::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-generos * {
        position: relative;
        z-index: 2;
    }

    .section-title-epic {
        font-size: 3.5rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
    }

    .stats-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .stat-card {
        text-align: center;
        padding: 20px;
        background: rgba(106, 17, 203, 0.05);
        border-radius: 15px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        background: rgba(106, 17, 203, 0.1);
    }

    .stat-number {
        font-size: 2.8rem;
        font-weight: 800;
        background: var(--gradient-primary);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 1.1rem;
        color: var(--purple);
        font-weight: 600;
    }

    .generos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .genero-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.4s ease;
        position: relative;
        min-height: 280px;
        cursor: pointer;
        animation: slideInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(40px);
    }

    .genero-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 25px 50px rgba(106, 17, 203, 0.25);
    }

    .genero-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .genero-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gradient-primary);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .genero-card:hover::before {
        opacity: 0.05;
    }

    .genero-header {
        padding: 25px 25px 15px;
        border-bottom: 1px solid rgba(106, 17, 203, 0.1);
        position: relative;
    }

    .genero-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        display: block;
    }

    .genero-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--purple);
        margin-bottom: 8px;
        position: relative;
    }

    .genero-subtitle {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.4;
    }

    .genero-body {
        padding: 20px 25px 25px;
        position: relative;
    }

    .genero-stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .mini-stat {
        text-align: center;
        flex: 1;
    }

    .mini-stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--purple);
        display: block;
    }

    .mini-stat-label {
        font-size: 0.8rem;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .explorar-btn {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 15px;
        padding: 12px 25px;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .explorar-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(106, 17, 203, 0.4);
        color: white;
        text-decoration: none;
    }

    .search-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .search-input {
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 15px 20px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .search-input:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
        outline: none;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .section-title-epic {
            font-size: 2.5rem;
        }

        .generos-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .genero-card {
            min-height: 250px;
        }
    }

    /* Gradientes específicos por género */
    .genero-fantasia {
        --gradient-color: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .genero-romance {
        --gradient-color: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .genero-thriller {
        --gradient-color: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    }

    .genero-ciencia-ficcion {
        --gradient-color: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .genero-misterio {
        --gradient-color: linear-gradient(135deg, #434343 0%, #000000 100%);
    }

    .genero-aventura {
        --gradient-color: linear-gradient(135deg, #ff6b6b 0%, #ffa500 100%);
    }

    .genero-clasicos {
        --gradient-color: linear-gradient(135deg, #8b5a3c 0%, #d4af37 100%);
    }

    .genero-no-ficcion {
        --gradient-color: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
    }

    .genero-juvenil {
        --gradient-color: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    }
</style>

<div class="generos-container">
    <div class="container mt-4">

        <!-- Hero Section -->
        <div class="hero-generos">
            <div class="text-center">
                <h1 class="section-title-epic">
                    📚 Universos Literarios
                </h1>
                <p class="lead">Explora mundos infinitos a través de cada género literario</p>
            </div>
        </div>

        <!-- Estadísticas generales -->
        <div class="stats-container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            <?php
                            $generos_disponibles = [];
                            foreach ($libros as $libro) {
                                if (!empty($libro['genero'])) {
                                    $generos_disponibles[$libro['genero']] = true;
                                }
                            }
                            echo count($generos_disponibles);
                            ?>
                        </div>
                        <div class="stat-label">Géneros Disponibles</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number"><?= count($libros) ?></div>
                        <div class="stat-label">Total de Libros</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            <?php
                            $autores_unicos = [];
                            foreach ($libros as $libro) {
                                if (!empty($libro['autor'])) {
                                    $autores_unicos[$libro['autor']] = true;
                                }
                            }
                            echo count($autores_unicos);
                            ?>
                        </div>
                        <div class="stat-label">Autores Únicos</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">
                            <?php
                            $nuevos = 0;
                            foreach ($libros as $libro) {
                                if (($libro['estado'] ?? '') === 'nuevo') {
                                    $nuevos++;
                                }
                            }
                            echo $nuevos;
                            ?>
                        </div>
                        <div class="stat-label">Libros Nuevos</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Búsqueda rápida -->
        <div class="search-section">
            <h4 class="text-center mb-4" style="color: var(--purple); font-weight: 700;">
                🔍 Encuentra tu género ideal
            </h4>
            <input type="text" id="genero-search" class="form-control search-input"
                placeholder="Buscar género literario...">
        </div>

        <!-- Grid de géneros -->
        <div class="generos-grid" id="generos-container">
            <?php
            // Agrupar libros por género
            $generos_data = [];
            foreach ($libros as $libro) {
                if (!empty($libro['genero'])) {
                    $genero = $libro['genero'];
                    if (!isset($generos_data[$genero])) {
                        $generos_data[$genero] = [
                            'total' => 0,
                            'autores' => [],
                            'nuevos' => 0
                        ];
                    }
                    $generos_data[$genero]['total']++;
                    if (!empty($libro['autor'])) {
                        $generos_data[$genero]['autores'][$libro['autor']] = true;
                    }
                    if (($libro['estado'] ?? '') === 'nuevo') {
                        $generos_data[$genero]['nuevos']++;
                    }
                }
            }

            // Definir iconos y descripciones por género
            $generos_info = [
                'Fantasía' => ['icon' => '🏰', 'desc' => 'Universos épicos, magia ancestral, tecnología futurista y mundos que desafían la realidad conocida.'],
                'Romance' => ['icon' => '💕', 'desc' => 'Historias de amor que trascienden el tiempo, emociones intensas y conexiones que cambian vidas.'],
                'Thriller' => ['icon' => '🕵️', 'desc' => 'Suspenso que acelera el pulso, investigaciones fascinantes y giros que te mantendrán despierto.'],
                'Ciencia Ficción' => ['icon' => '🚀', 'desc' => 'Tecnología futurista, exploración espacial y visiones del mañana que podrían hacerse realidad.'],
                'Misterio' => ['icon' => '🔍', 'desc' => 'Enigmas por resolver, crímenes intrincados y detective work que desafía tu mente.'],
                'Aventura' => ['icon' => '⚔️', 'desc' => 'Viajes épicos, exploraciones peligrosas y héroes que enfrentan lo imposible.'],
                'Clásicos' => ['icon' => '📜', 'desc' => 'Obras atemporales que han marcado la literatura universal y siguen inspirando generaciones.'],
                'No Ficción' => ['icon' => '📊', 'desc' => 'Conocimiento real, biografías inspiradoras y hechos que amplían tu perspectiva del mundo.'],
                'Juvenil' => ['icon' => '🌟', 'desc' => 'Historias de crecimiento, aventuras de juventud y personajes que descubren su lugar en el mundo.']
            ];

            $index = 0;
            foreach ($generos_data as $genero => $data):
                $info = $generos_info[$genero] ?? ['icon' => '📖', 'desc' => 'Descubre las maravillosas historias de este género literario.'];
                $clase_genero = 'genero-' . strtolower(str_replace([' ', 'ó', 'í'], ['-', 'o', 'i'], $genero));
                ?>
                <div class="genero-card <?= $clase_genero ?> genero-item" data-genre="<?= strtolower($genero) ?>"
                    style="animation-delay: <?= $index * 0.1 ?>s;" onclick="explorarGenero('<?= urlencode($genero) ?>')">

                    <div class="genero-header">
                        <span class="genero-icon"><?= $info['icon'] ?></span>
                        <h3 class="genero-title"><?= htmlspecialchars($genero) ?></h3>
                        <p class="genero-subtitle"><?= $info['desc'] ?></p>
                    </div>

                    <div class="genero-body">
                        <div class="genero-stats">
                            <div class="mini-stat">
                                <span class="mini-stat-number"><?= $data['total'] ?></span>
                                <span class="mini-stat-label">Libros</span>
                            </div>
                            <div class="mini-stat">
                                <span class="mini-stat-number"><?= count($data['autores']) ?></span>
                                <span class="mini-stat-label">Autores</span>
                            </div>
                            <div class="mini-stat">
                                <span class="mini-stat-number"><?= $data['nuevos'] ?></span>
                                <span class="mini-stat-label">Nuevos</span>
                            </div>
                        </div>

                        <a href="index.php?c=LibroController&a=explorar&genero=<?= urlencode($genero) ?>"
                            class="explorar-btn">
                            🌟 Explorar <?= htmlspecialchars($genero) ?>
                        </a>
                    </div>
                </div>
                <?php
                $index++;
            endforeach;
            ?>
        </div>

        <?php if (empty($generos_data)): ?>
            <div class="text-center mt-5">
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px; padding: 60px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
                    <i class="bi bi-book" style="font-size: 4rem; color: var(--purple-light); margin-bottom: 20px;"></i>
                    <h3 style="color: var(--purple);">No hay géneros disponibles</h3>
                    <p class="text-muted">Aún no se han publicado libros en la plataforma.</p>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<script>
    // Animaciones de entrada
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.genero-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 150);
        });
    });

    // Búsqueda de géneros
    document.getElementById('genero-search').addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const generos = document.querySelectorAll('.genero-item');

        generos.forEach(genero => {
            const genreText = genero.dataset.genre;
            if (genreText.includes(searchTerm)) {
                genero.style.display = 'block';
            } else {
                genero.style.display = 'none';
            }
        });
    });

    // Función para explorar género
    function explorarGenero(genero) {
        window.location.href = `index.php?c=LibroController&a=explorar&genero=${genero}`;
    }
</script>