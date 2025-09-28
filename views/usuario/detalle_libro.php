<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($libro['titulo']) ?> - Detalle</title>
    <link rel="stylesheet" href="public/css/detalle_libro.css">
</head>
<body>
    <div class="detalle-container">
        <div class="container">
            <div class="main-card">
                <div class="libro-header">
                    <div class="text-center">
                        <h1>📚 Detalle del Libro</h1>
                        <p class="mb-0">Toda la información sobre esta obra</p>
                    </div>
                </div>
                <div class="libro-content">
                    <div class="imagen-section">
                        <?php 
                        $rutaImagen = 'public/img/libros/';
                        if (isset($libro['tabla_origen']) && $libro['tabla_origen'] === 'libros_venta') {
                            $rutaImagen .= htmlspecialchars($libro['imagen'] ?? 'default.png');
                        } else {
                            $rutaImagen .= '' . htmlspecialchars($libro['imagen'] ?? 'default.png');
                        }
                        ?>
                        <img src="<?= $rutaImagen ?>" 
                             class="libro-imagen" 
                             alt="Portada de <?= htmlspecialchars($libro['titulo']) ?>">
                        
                        <?php if (!empty($libro['precio'])): ?>
                            <div class="precio-badge">
                                $<?= number_format($libro['precio'], 0, ',', '.') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="info-section">
                        <div>
                            <h1 class="libro-titulo"><?= htmlspecialchars($libro['titulo']) ?></h1>
                            
                            <?php if (!empty($libro['descripcion'])): ?>
                                <p class="libro-subtitle"><?= htmlspecialchars($libro['descripcion']) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="meta-badges">
                            <?php if (!empty($libro['genero'])): ?>
                                <span class="meta-badge badge-genero">
                                    📚 <?= htmlspecialchars($libro['genero']) ?>
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($libro['estado'])): ?>
                                <span class="meta-badge badge-estado">
                                    ⭐ <?= ucfirst($libro['estado']) ?>
                                </span>
                            <?php endif; ?>
                            <?php 
                            $nombreUsuario = 'LibrosWap'; // Default
                            if (isset($libro['tabla_origen']) && $libro['tabla_origen'] === 'libros_venta') {
                                $nombreUsuario = $libro['nombre_usuario'] ?? $libro['nombre'] ?? 'Usuario';
                            }
                            ?>
                            <span class="meta-badge badge-usuario">
                                👤 <?= htmlspecialchars($nombreUsuario) ?>
                            </span>
                            <span class="meta-badge badge-origen">
                                <?php if (isset($libro['tabla_origen']) && $libro['tabla_origen'] === 'libros_venta'): ?>
                                    🙋 Usuario
                                <?php else: ?>
                                    🏪 LibrosWap
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Autor</div>
                                <div class="info-value"><?= htmlspecialchars($libro['autor']) ?></div>
                            </div>
                            <?php if (!empty($libro['genero'])): ?>
                                <div class="info-item">
                                    <div class="info-label">Género</div>
                                    <div class="info-value"><?= htmlspecialchars($libro['genero']) ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="info-item">
                                <div class="info-label">Estado</div>
                                <div class="info-value"><?= ucfirst($libro['estado']) ?></div>
                            </div>
                            <?php if (!empty($libro['precio'])): ?>
                                <div class="info-item">
                                    <div class="info-label">Precio</div>
                                    <div class="info-value">$<?= number_format($libro['precio'], 0, ',', '.') ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($libro['descripcion'])): ?>
                            <div class="descripcion-section">
                                <h3 class="descripcion-title">📖 Descripción</h3>
                                <div class="descripcion-text">
                                    <?= nl2br(htmlspecialchars($libro['descripcion'])) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="actions-section">
                            <?php 
                            $esLibroDeUsuario = isset($libro['tabla_origen']) && $libro['tabla_origen'] === 'libros_venta';
                            $parametroTabla = $esLibroDeUsuario ? '&tabla=libros_venta' : '&tabla=libros';
                            ?>
                            <?php if ($esLibroDeUsuario): ?>
                                <a href="index.php?c=IntercambioController&a=solicitar&id=<?= $libro['id'] ?><?= $parametroTabla ?>" 
                                   class="action-btn btn-intercambio">
                                    🔄 Solicitar Intercambio
                                </a>
                                <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?><?= $parametroTabla ?>" 
                                   class="action-btn btn-comprar">
                                    🛒 Agregar al Carrito
                                </a>
                            <?php else: ?>
                                <a href="index.php?c=CarritoController&a=agregar&id=<?= $libro['id'] ?><?= $parametroTabla ?>" 
                                   class="action-btn btn-comprar">
                                    🛒 Agregar al Carrito
                                </a>
                            <?php endif; ?>
                            <a href="index.php?c=ResenaController&a=formulario&id=<?= $libro['id'] ?>&titulo=<?= urlencode($libro['titulo']) ?><?= $parametroTabla ?>" 
                               class="action-btn btn-resena">
                                ✍️ Escribir Reseña
                            </a>
                        </div>
                        <div class="availability-info">
                            <?php if ($esLibroDeUsuario): ?>
                                <strong>💰🔄 Este libro está disponible para compra e intercambio</strong>
                                <br><small>Publicado por un usuario de la comunidad</small>
                            <?php else: ?>
                                <strong>💰 Este libro está disponible para compra directa</strong>
                                <br><small>Vendido oficialmente por LibrosWap</small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resenas-section">
                <h2 class="resenas-title">📝 Reseñas</h2>
                <?php if (!empty($resenas)): ?>
                    <?php foreach ($resenas as $r): ?>
                        <div class="resena-item">
                            <div class="resena-text">
                                <?= htmlspecialchars($r['comentario']) ?>
                            </div>
                            <div class="resena-rating">
                                ⭐ <?= $r['calificacion'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-resenas">
                        No hay reseñas para este libro aún. ¡Sé el primero en escribir una!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>