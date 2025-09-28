<link rel="stylesheet" href="public/css/generos.css">
<div class="generos-container">
    <div class="container mt-4">
        <div class="hero-generos">
            <div class="text-center">
                <h1 class="section-title-epic">
                    📚 Universos Literarios
                </h1>
                <p class="lead">Explora mundos infinitos a través de cada género literario</p>
            </div>
        </div>
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
        <div class="search-section">
            <h4 class="text-center mb-4" style="color: var(--purple); font-weight: 700;">
                🔍 Encuentra tu género ideal
            </h4>
            <input type="text" id="genero-search" class="form-control search-input"
                placeholder="Buscar género literario...">
        </div>
        <div class="generos-grid" id="generos-container">
            <?php
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
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.genero-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 150);
        });
    });
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
    function explorarGenero(genero) {
        window.location.href = `index.php?c=LibroController&a=explorar&genero=${genero}`;
    }
</script>