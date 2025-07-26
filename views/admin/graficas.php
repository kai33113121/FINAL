<h2 class="mb-4">📊 Estadísticas generales</h2>

<div class="card p-4 bg-purple-light shadow-sm">
    <canvas id="graficoGeneral" width="400" height="200"></canvas>
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