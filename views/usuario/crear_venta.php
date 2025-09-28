<link rel="stylesheet" href="public/css/crear_venta.css">
<div class="form-container">
    <div class="form-header">
        <h2 class="form-title">
            <i class="bi bi-plus-circle"></i> Publicar Libro
        </h2>
        <p class="form-subtitle">Comparte tu libro con la comunidad LibrosWap</p>
    </div>
    <div class="form-body">
        <form method="POST" action="index.php?c=VentaController&a=crear" enctype="multipart/form-data" id="bookForm">
            <div class="form-section">
                <div class="form-section-title">
                    <i class="bi bi-book"></i> Información Básica
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-bookmark"></i> Título del libro
                    </label>
                    <div class="input-group">
                        <input type="text" name="titulo" class="form-control" required 
                               placeholder="Escribe el título del libro">
                        <i class="bi bi-pencil input-icon"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-person"></i> Autor
                    </label>
                    <div class="input-group">
                        <input type="text" name="autor" class="form-control" 
                               placeholder="Nombre del autor">
                        <i class="bi bi-person-circle input-icon"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-chat-text"></i> Descripción
                    </label>
                    <textarea name="descripcion" class="form-control" rows="4" 
                              placeholder="Describe el libro, su estado, por qué lo vendes..."></textarea>
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-title">
                    <i class="bi bi-tags"></i> Detalles del Libro
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-bookmark-star"></i> Género literario
                    </label>
                    <select name="genero" class="form-select" required>
                        <option value="">Selecciona un género</option>
                        <option value="Fantasía">Fantasía</option>
                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                        <option value="Romance">Romance</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Misterio">Misterio</option>
                        <option value="No Ficción">No Ficción</option>
                        <option value="Clásicos">Clásicos</option>
                        <option value="Juvenil">Juvenil</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-star"></i> Estado del libro
                    </label>
                    <div class="estado-toggle">
                        <div class="estado-option active" onclick="selectEstado('nuevo', this)">
                            <i class="bi bi-gem"></i> Nuevo
                        </div>
                        <div class="estado-option" onclick="selectEstado('usado', this)">
                            <i class="bi bi-book"></i> Usado
                        </div>
                    </div>
                    <input type="hidden" name="estado" value="nuevo" id="estadoInput">
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-title">
                    <i class="bi bi-currency-dollar"></i> Precio
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-cash"></i> Precio de venta
                    </label>
                    <div class="price-input-wrapper">
                        <span class="price-symbol">$</span>
                        <input type="number" step="0.01" name="precio" class="form-control price-input" required 
                               placeholder="0.00" min="0">
                    </div>
                    <small class="text-muted">Ingresa el precio en pesos colombianos, sin comas o puntos</small>
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-title">
                    <i class="bi bi-image"></i> Imagen del Libro
                </div>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-camera"></i> Subir imagen
                    </label>
                    <div class="file-input-wrapper">
                        <div class="file-input-custom" onclick="document.getElementById('fileInput').click()">
                            <input type="file" name="imagen" id="fileInput" required accept="image/*">
                            <div class="file-input-icon">
                                <i class="bi bi-cloud-upload"></i>
                            </div>
                            <div class="file-input-text">
                                Haz clic para seleccionar una imagen
                            </div>
                            <small class="text-muted">JPG, PNG o GIF (máx. 5MB)</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-upload"></i> Publicar Libro
                </button>
                <a href="index.php?c=UsuarioController&a=dashboard" class="btn-back">
                    <i class="bi bi-arrow-left-circle"></i> Volver al Dashboard
                </a>
            </div>
        </form>
    </div>
</div>
<script src="public/js/crear_venta.js"></script>
