<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Explorar Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-4">

        <h2 class="mb-4 text-center">📖 Libros Disponibles</h2>
        <div class="row">
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="public/img/<?php echo $libro['imagen']; ?>" 
                                class="card-img-top" 
                                alt="<?php echo $libro['titulo']; ?>" 
                                style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
                                <p class="card-text"><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
                                <p class="card-text"><strong>Género:</strong> <?php echo $libro['genero']; ?></p>
                                <p class="card-text"><?php echo substr($libro['descripcion'], 0, 80); ?>...</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="index.php?c=DetalleLibroController&a=verDetalle&id=<?php echo $libro['id']; ?>" 
                                class="btn btn-primary btn-sm">Ver Detalle</a>
                                <a href="index.php?c=VentaController&a=detalle&id=<?php echo $libro['id']; ?>" 
                                class="btn btn-success btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No hay libros disponibles.</p>
            <?php endif; ?>
        </div>

        <hr class="my-5">

        <h2 class="mb-4 text-center">💰 Libros en Venta</h2>
        <div class="row">
            <?php if (!empty($ventas)): ?>
                <?php foreach ($ventas as $libro): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="uploads/<?php echo $libro['imagen']; ?>" 
                                class="card-img-top" 
                                alt="<?php echo $libro['titulo']; ?>" 
                                style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
                                <p class="card-text"><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
                                <p class="card-text"><strong>Género:</strong> <?php echo $libro['genero']; ?></p>
                                <p class="card-text"><?php echo substr($libro['descripcion'], 0, 80); ?>...</p>
                                <p class="card-text text-success fw-bold">$<?php echo number_format($libro['precio'], 2); ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="index.php?c=detalle_libro&a=ver&id=<?php echo $libro['id']; ?>" 
                                class="btn btn-primary btn-sm">Ver Detalle</a>
                                <a href="index.php?c=venta&a=detalle&id=<?php echo $libro['id']; ?>" 
                                class="btn btn-success btn-sm">Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No hay libros en venta disponibles.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>

