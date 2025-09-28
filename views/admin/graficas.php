<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image:
                linear-gradient(135deg, rgba(87, 87, 87, 0.65) 0%, rgba(120, 107, 132, 0.85) 100%),
                url('/FINAL/public/img/sideadmin.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .bg-overlay {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .stats-container {
            padding: 2rem 0;
        }

        .stats-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .stats-header {
            background: linear-gradient(135deg, #2f012eff 0%, #a29bfe 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .stats-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .bg-purple-light {
            background: rgba(255, 255, 255, 0.98) !important;
            border: 1px solid rgba(78, 6, 97, 0.1);
        }

        @media (max-width: 768px) {
            .stats-container {
                padding: 1rem 0;
            }

            .stats-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid stats-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card stats-card bg-overlay">
                    <!-- Header -->
                    <div class="stats-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-chart-bar stats-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📊 Estadísticas Generales</h2>
                                <p class="mb-0 opacity-75">Resumen de datos principales del sistema</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gráfica -->
                    <div class="card-body p-4">
                        <div class="card p-4 bg-purple-light shadow-sm">
                            <canvas id="graficoGeneral" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('graficoGeneral').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Libros', 'Usuarios', 'Intercambios', 'Ventas'],
                    datasets: [{
                        label: 'Cantidad',
                        data: [<?= $stats['libros'] ?>, <?= $stats['usuarios'] ?>, <?= $stats['intercambios'] ?>, <?= $stats['ventas'] ?>],
                        backgroundColor: ['#9575cd', '#7e57c2', '#5e35b1', '#d1c4e9'],
                        borderColor: '#6a1b9a',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</body>

</html>