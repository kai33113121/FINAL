<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/dashboarda.css">
</head>
<body>
    <div class="dashboard-wrapper">
        <h2 class="mb-4 main-title">📊 Panel de administración</h2>
        <?php
        $modulos = [
            ['icon' => 'bi-book', 'label' => 'Libros publicados', 'valor' => $stats['libros'], 'link' => 'libros'],
            ['icon' => 'bi-arrow-repeat', 'label' => 'Intercambios', 'valor' => $stats['intercambios'], 'link' => 'intercambios'],
            ['icon' => 'bi-people', 'label' => 'Usuarios registrados', 'valor' => $stats['usuarios'], 'link' => 'usuarios'],
            ['icon' => 'bi-calendar-event', 'label' => 'Eventos activos', 'valor' => $stats['eventos'], 'link' => 'eventos'],
            ['icon' => 'bi-chat-left-text', 'label' => 'Reseñas recibidas', 'valor' => $stats['resenas'], 'link' => 'resenas'],
             ['icon' => 'bi-cart-check', 'label' => 'Ventas realizadas', 'valor' => $stats['ventas'], 'link' => 'ventas'],
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
    </div>
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
</body>
</html>