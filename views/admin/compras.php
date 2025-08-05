<div class="container mt-5">
    <h3 class="text-purple fw-bold mb-4">🛒 Historial de compras</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-purple text-white">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Libro</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($compras)): ?>
                    <?php foreach ($compras as $compra): ?>
                        <tr>
                            <td><?= $compra['id'] ?></td>
                            <td><?= htmlspecialchars($compra['usuario']) ?></td>
                            <td><?= htmlspecialchars($compra['libro']) ?></td>
                            <td><?= date('d M Y H:i', strtotime($compra['fecha'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No se han registrado compras aún.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>