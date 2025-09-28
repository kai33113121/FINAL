
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --purple: #6a11cb;
    }

    .crear-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 90vh;
        padding: 40px 0;
    }

    .hero-crear {
        background: var(--gradient-primary);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 40px;
    }

    .hero-crear::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .hero-crear * {
        position: relative;
        z-index: 2;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 15px 20px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
        outline: none;
    }

    label {
        font-weight: 600;
        color: var(--purple);
        margin-bottom: 10px;
        font-size: 1.1rem;
    }

    .btn-publicar {
        background: var(--gradient-primary);
        border: none;
        color: white;
        border-radius: 25px;
        padding: 15px 40px;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .btn-publicar:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(106, 17, 203, 0.4);
        color: white;
    }

    .btn-volver {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple);
        color: var(--purple);
        border-radius: 25px;
        padding: 12px 25px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-volver:hover {
        background: var(--purple);
        color: white;
        text-decoration: none;
    }

    .section-title-epic {
        font-size: 2.5rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
    }

    .upload-area {
        border: 2px dashed var(--purple);
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        background: rgba(106, 17, 203, 0.05);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .upload-area:hover {
        background: rgba(106, 17, 203, 0.1);
    }
</style>

<div class="crear-container">
    <div class="container mt-4">

        <div class="hero-crear">
            <div class="text-center">
                <h1 class="section-title-epic">
                    <i class="bi bi-plus-circle me-3"></i>Publicar Nuevo Libro
                </h1>
                <p class="lead">Comparte tu libro con la comunidad y comienza a generar intercambios</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic">
                    <div class="card-body p-5">
                        <form method="POST" action="index.php?c=VentaController&a=crear" enctype="multipart/form-data">

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label>Título</label>
                                    <input type="text" name="titulo" class="form-control"
                                        placeholder="Ej: Cien años de soledad" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Autor</label>
                                    <input type="text" name="autor" class="form-control"
                                        placeholder="Ej: Gabriel García Márquez">
                                </div>
                                <div class="col-12">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" class="form-control" rows="4"
                                        placeholder="Describe el libro, su estado, y por qué lo recomiendas..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Precio</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: rgba(106, 17, 203, 0.1); border-color: #e9ecef;">$ COP</span>
                                        <input type="number" step="0.01" name="precio" class="form-control"
                                            placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Género literario</label>
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
                                <div class="col-md-4">
                                    <label>Estado</label>
                                    <select name="estado" class="form-select">
                                        <option value="nuevo">Nuevo</option>
                                        <option value="segunda mano">Segunda mano</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label>Imagen</label>
                                    <div class="upload-area" onclick="document.getElementById('imagen').click()">
                                        <i class="bi bi-cloud-upload text-purple fs-1 mb-3"></i>
                                        <h5 class="text-purple">Sube una foto de tu libro</h5>
                                        <p class="text-muted">Haz clic para seleccionar una imagen</p>
                                    </div>
                                    <input type="file" name="imagen" id="imagen" class="form-control d-none"
                                        accept="image/*" required onchange="previewImage(this)">
                                    <div id="preview-container" class="mt-3 text-center" style="display: none;">
                                        <img id="preview-img"
                                            style="max-width: 200px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn-publicar me-3">
                                    <i class="bi bi-upload me-2"></i>Publicar
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="index.php?c=UsuarioController&a=dashboard" class="btn-volver">
                                <i class="bi bi-arrow-left-circle me-2"></i>Volver al dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-container').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>