<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>🛒 Mi carrito</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($items as $item): 
                    $total += $item['precio'];
                ?>
                    <tr>
                        <td><?= htmlspecialchars($item['titulo']) ?></td>
                        <td><?= htmlspecialchars($item['autor']) ?></td>
                        <td>$<?= number_format($item['precio'], 2) ?></td>
                        <td>
                            <a href="index.php?c=CarritoController&a=eliminar&id=<?= $item['id'] ?>"
                                class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mb-3">
            <strong>Total: $<?= number_format($total, 2) ?></strong>
        </div>
        <a href="index.php?c=CarritoController&a=confirmar" class="btn btn-success">Confirmar compra</a>
    </div>
</body>

</html>