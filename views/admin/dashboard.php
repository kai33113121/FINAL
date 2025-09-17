<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Solo agregar el fondo sin interferir con nada más */
        body {
            background-image:
                linear-gradient(135deg, rgba(87, 87, 87, 0.65) 0%, rgba(120, 107, 132, 0.85) 100%),
                url('/FINAL/public/img/sideadmin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        /* Contenedor con overlay sutil */
        .dashboard-wrapper {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            border-radius: 15px;
            margin: 1rem;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        /* Mejorar tu card existente sin cambiar mucho */
        .card-dashboard {
            min-height: 140px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            border-radius: 12px;
            background-color: #ede7f6;
            transition: transform 0.2s ease;
            border: 1px solid rgba(126, 87, 194, 0.2);
        }

        .card-dashboard:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(126, 87, 194, 0.2);
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
            color: #1a237e;
        }

        .card-dashboard .info p {
            font-size: 1.5rem;
            margin: 0;
            color: #4a148c;
        }

        /* Mejorar las gráficas sin cambiar estructura */
        .card {
            border: 1px solid rgba(126, 87, 194, 0.1);
            border-radius: 12px;
        }

        .card h6 {
            color: #4a148c;
            font-weight: 600;
        }

        /* Título principal */
        .main-title {
            color: #2f012eff;
            margin-bottom: 2rem;
        }
    </style>
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
</body>
</html>