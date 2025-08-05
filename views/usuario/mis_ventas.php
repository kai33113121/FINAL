<h2 class="mb-4 text-purple"><i class="bi bi-book"></i> Mis libros en venta</h2>
<div class="row">
    <?php if (!empty($libros)): ?>
        <?php foreach ($libros as $libro): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    
                    <img src="public/img/<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="Libro">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                        <p class="card-text text-muted"><?= htmlspecialchars($libro['autor']) ?></p>
                        <p class="card-text"><?= htmlspecialchars($libro['descripcion']) ?></p>
                        <span class="badge bg-purple">💰
                            $<?= number_format($libro['precio'], 2) ?></span><?php if (!empty($libro['estado'])): ?>
    <?php
        $estadoTexto = htmlspecialchars($libro['estado']);
        $estadoColor = ($estadoTexto === 'nuevo') ? 'bg-success' : 'bg-warning';
    ?>
    <span class="badge <?= $estadoColor ?>">
        <?= ucfirst($estadoTexto) ?>
    </span>
<?php endif; ?>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="index.php?c=VentaController&a=editarVista&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <a href="index.php?c=VentaController&a=eliminar&id=<?= $libro['id'] ?>"
                                class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar este libro?');">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">No has publicado ningún libro aún.</p>
        <a href="index.php?c=VentaController&a=crearVista" class="btn btn-purple mt-3">
            <i class="bi bi-upload"></i> Publicar libro
        </a>
    <?php endif; ?>
    <div class="mb-3">
        <a href="index.php?c=UsuarioController&a=dashboard" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver al dashboard
        </a>
    </div>
</div>