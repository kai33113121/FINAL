<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/graficas.css">
</head>
<body>
    <div class="container-fluid stats-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card stats-card bg-overlay">
                    <div class="stats-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <i class="fas fa-chart-bar stats-icon"></i>
                            </div>
                            <div class="col-md-10 text-md-start text-center">
                                <h2 class="mb-2 fw-bold">📊 Dashboard de Estadísticas</h2>
                                <p class="mb-0 opacity-75">Análisis completo de datos del sistema LibrosWap</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="stat-summary">
                            <div class="row">
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['libros_admin'] ?></div>
                                    <div class="stat-label">Libros Admin</div>
                                </div>
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['libros_usuarios'] ?></div>
                                    <div class="stat-label">Libros Usuarios</div>
                                </div>
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['usuarios'] ?></div>
                                    <div class="stat-label">Usuarios</div>
                                </div>
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['intercambios'] ?></div>
                                    <div class="stat-label">Intercambios</div>
                                </div>
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['compras'] ?></div>
                                    <div class="stat-label">Compras</div>
                                </div>
                                <div class="col-md-2 stat-item">
                                    <div class="stat-number"><?= $stats['resenas'] ?></div>
                                    <div class="stat-label">Reseñas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card stats-card bg-overlay">
                    <div class="card-header bg-purple-light">
                        <h4 class="mb-0 text-center fw-bold" style="color: #2f012eff;">
                            <i class="fas fa-chart-pie me-2"></i>Distribución General del Sistema
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="chart-container">
                            <canvas id="graficoGeneral"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card stats-card bg-overlay">
                            <div class="card-header bg-purple-light">
                                <h5 class="mb-0 text-center fw-bold" style="color: #2f012eff;">
                                    <i class="fas fa-book me-2"></i>Distribución de Libros
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="height: 300px;">
                                    <canvas id="graficoLibros"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card stats-card bg-overlay">
                            <div class="card-header bg-purple-light">
                                <h5 class="mb-0 text-center fw-bold" style="color: #2f012eff;">
                                    <i class="fas fa-users me-2"></i>Actividad de Usuarios
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="height: 300px;">
                                    <canvas id="graficoActividad"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx1 = document.getElementById('graficoGeneral').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Libros Admin', 'Libros Usuarios', 'Usuarios', 'Intercambios', 'Compras', 'Reseñas'],
                    datasets: [{
                        label: 'Cantidad',
                        data: [
                            <?= $stats['libros_admin'] ?>, 
                            <?= $stats['libros_usuarios'] ?>, 
                            <?= $stats['usuarios'] ?>, 
                            <?= $stats['intercambios'] ?>, 
                            <?= $stats['compras'] ?>, 
                            <?= $stats['resenas'] ?>
                        ],
                        backgroundColor: [
                            '#6f42c1', 
                            '#9575cd',   
                            '#6f42c1',  
                            '#9575cd',  
                            '#6f42c1',  
                            '#9575cd'   
                        ],
                        borderColor: '#2f012eff',
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Estadísticas Generales del Sistema',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#2f012eff'
                        }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            grid: {
                                color: '#e9ecef'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            const ctx2 = document.getElementById('graficoLibros').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Libros del Admin', 'Libros de Usuarios'],
                    datasets: [{
                        data: [<?= $stats['libros_admin'] ?>, <?= $stats['libros_usuarios'] ?>],
                        backgroundColor: ['#6f42c1', '#9575cd'],
                        borderColor: ['#2f012eff', '#2f012eff'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
            const ctx3 = document.getElementById('graficoActividad').getContext('2d');
            new Chart(ctx3, {
                type: 'radar',
                data: {
                    labels: ['Usuarios', 'Intercambios', 'Compras', 'Reseñas'],
                    datasets: [{
                        label: 'Actividad',
                        data: [
                            <?= $stats['usuarios'] ?>, 
                            <?= $stats['intercambios'] ?>, 
                            <?= $stats['compras'] ?>, 
                            <?= $stats['resenas'] ?>
                        ],
                        backgroundColor: 'rgba(111, 66, 193, 0.2)',
                        borderColor: '#6f42c1',
                        borderWidth: 3,
                        pointBackgroundColor: '#2f012eff',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            grid: {
                                color: '#e9ecef'
                            },
                            pointLabels: {
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                },
                                color: '#2f012eff'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>