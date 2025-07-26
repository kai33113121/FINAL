<h2 class="mb-4">📊 Panel de administración</h2>

<style>
    .card-dashboard {
        min-height: 140px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        border-radius: 12px;
        background-color: #ede7f6;
        transition: transform 0.2s ease;
    }

    .card-dashboard:hover {
        transform: scale(1.02);
    }

    .card-dashboard i {
        font-size: 2rem;
        color: #7e57c2;
    }

    .card-dashboard .info {
        text-align: right;
    }

    .card-dashboard .info h5 {
    margin: 0;
    font-weight: bold;
    color: #1a237e; /* Azul oscuro */
}

.card-dashboard .info p {
    font-size: 1.5rem;
    margin: 0;
    color: #4a148c; /* Púrpura profundo */
}
</style>

<?php
$modulos = [
    ['icon' => 'bi-book', 'label' => 'Libros publicados', 'valor' => $stats['libros'], 'link' => 'libros'],
    ['icon' => 'bi-arrow-repeat', 'label' => 'Intercambios', 'valor' => $stats['intercambios'], 'link' => 'intercambios'],
    ['icon' => 'bi-people', 'label' => 'Usuarios registrados', 'valor' => $stats['usuarios'], 'link' => 'usuarios'],
    ['icon' => 'bi-calendar-event', 'label' => 'Eventos activos', 'valor' => $stats['eventos'], 'link' => 'eventos'],
    ['icon' => 'bi-chat-left-text', 'label' => 'Reseñas recibidas', 'valor' => $stats['resenas'], 'link' => 'resenas'],
    // ['icon' => 'bi-cart-check', 'label' => 'Ventas realizadas', 'valor' => $stats['ventas'], 'link' => 'ventas'],
];
?>

<div class="row g-3">
    <?php foreach ($modulos as $m): ?>
    <div class="col-md-6 col-lg-4">
        <a href="index.php?c=AdminController&a=<?= $m['link'] ?>" class="text-decoration-none">
            <div class="card-dashboard shadow-sm">
                <i class="bi <?= $m['icon'] ?>"></i>
                <div class="info">
                    <h5><?= $m['label'] ?></h5>
                    <p><?= $m['valor'] ?>+</p>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>

<!-- 📊 Gráficas -->
<div class="row g-3 mt-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body p-2">
                <h6 class="text-center mb-2">Libros por género</h6>
                <canvas id="graficoGeneros" style="height:260px; max-height:260px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body p-2">
                <h6 class="text-center mb-2">Intercambios por estado</h6>
                <canvas id="graficoIntercambios" style="height:260px; max-height:260px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body p-2">
                <h6 class="text-center mb-2">Top libros reseñados</h6>
                <canvas id="graficoResenas" style="height:260px; max-height:260px;"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- 📈 Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const graficoGeneros = new Chart(document.getElementById('graficoGeneros'), {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_keys($generos)) ?>,
            datasets: [{
                data: <?= json_encode(array_values($generos)) ?>,
                backgroundColor: ['#2c032e', '#551854', '#964a88', '#380867', '#270663']
            }]
        }
    });

    const graficoIntercambios = new Chart(document.getElementById('graficoIntercambios'), {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_keys($estadosIntercambio)) ?>,
            datasets: [{
                label: 'Cantidad',
                data: <?= json_encode(array_values($estadosIntercambio)) ?>,
                backgroundColor: '#46085d'
            }]
        }
    });

    const graficoResenas = new Chart(document.getElementById('graficoResenas'), {
        type: 'pie',
        data: {
            labels: <?= json_encode(array_keys($resenasPorLibro)) ?>,
            datasets: [{
                data: <?= json_encode(array_values($resenasPorLibro)) ?>,
                backgroundColor: ['#290530', '#6f248f', '#9e8fb7', '#e83e8c', '#150443']
            }]
        }
    });
</script>