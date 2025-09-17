<!-- Estilos solo para esta vista -->
<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --purple: #6a11cb;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card-epic:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(106, 17, 203, 0.15);
    }

    .user-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border: none;
        border-radius: 15px;
        transition: all 0.4s ease;
        margin-bottom: 8px;
    }

    .user-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(106, 17, 203, 0.15);
    }

    .chat-card {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border: none;
        border-radius: 15px;
        transition: all 0.4s ease;
        margin-bottom: 15px;
    }

    .chat-card:hover {
        transform: translateX(3px);
        box-shadow: 0 10px 25px rgba(79, 172, 254, 0.15);
    }

    .user-avatar {
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .user-avatar:hover {
        transform: scale(1.05);
    }

    .btn-outline-purple {
        border-color: var(--purple);
        color: var(--purple);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 8px 16px;
    }

    .btn-outline-purple:hover {
        background-color: var(--purple);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(106, 17, 203, 0.3);
    }

    .btn-primary {
        background: var(--gradient-tertiary);
        border: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 8px 16px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 172, 254, 0.3);
    }

    .text-purple {
        color: var(--purple) !important;
    }

    .badge-unread {
        background: var(--gradient-secondary);
        border-radius: 50px;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .online-indicator {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 12px;
        height: 12px;
        background: #00d4aa;
        border: 2px solid white;
        border-radius: 50%;
    }

    .stats-mini {
        background: linear-gradient(135deg, #f8f4ff 0%, #e8d5ff 100%);
        border-radius: 15px;
        padding: 15px;
        margin-bottom: 20px;
        text-align: center;
    }

    .search-input {
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid rgba(106, 17, 203, 0.2);
        border-radius: 25px;
        padding: 10px 15px 10px 40px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .search-input:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
        outline: none;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--purple);
        z-index: 3;
    }

    .search-container {
        position: relative;
        margin-bottom: 15px;
    }

    .delete-chat-btn {
        background: linear-gradient(135deg, #ff6b6b, #ff5252);
        border: none;
        color: white;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 0.8rem;
    }

    .delete-chat-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        color: white;
    }

    .dynamic-title {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }
</style>

<!-- Estadísticas dinámicas reales -->
<div class="container-fluid mt-3">
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stats-mini">
                <i class="bi bi-people-fill text-purple fs-4"></i>
                <div class="fw-bold"><?= count($usuarios) ?> usuarios</div>
                <small class="text-muted">Disponibles para chat</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-mini">
                <i class="bi bi-chat-dots-fill text-purple fs-4"></i>
                <div class="fw-bold" id="chat-counter"><?= count($conversaciones) ?> conversaciones</div>
                <small class="text-muted">Activas</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-mini">
                <i class="bi bi-envelope-fill text-purple fs-4"></i>
                <div class="fw-bold">
                    <?php
                    $total_no_leidos = 0;
                    foreach ($conversaciones as $conv) {
                        $total_no_leidos += $conv['mensajes_no_leidos'] ?? 0;
                    }
                    echo $total_no_leidos;
                    ?>
                </div>
                <small class="text-muted">Mensajes sin leer</small>
            </div>
        </div>
    </div>
</div>

<!-- Contenido principal del chat -->
<div class="container py-4">
    <div class="row">
        <!-- Usuarios disponibles -->
        <div class="col-md-6 mb-4">
            <div class="card card-epic shadow-sm border-0">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="dynamic-title mb-3">
                        <i class="bi bi-person-plus-fill me-2"></i>Descubrir Nuevos Lectores
                    </h5>

                    <!-- Filtro de búsqueda -->
                    <div class="search-container">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Buscar usuarios por nombre..."
                            id="searchUsers">
                    </div>
                </div>
                <div class="card-body p-0" id="usersList">
                    <?php foreach ($usuarios as $u): ?>
                        <div class="user-card p-3 mx-3 user-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <img src="public/img/usuarios/<?= !empty($u['foto']) ? htmlspecialchars($u['foto']) : 'default.jpg' ?>"
                                            class="rounded-circle user-avatar" width="50" height="50"
                                            onerror="this.onerror=null;this.src='public/img/usuarios/default.jpg';">
                                        <div class="online-indicator"></div>
                                    </div>
                                    <div>
                                        <span
                                            class="fw-semibold d-block user-name"><?= htmlspecialchars($u['nombre']) ?></span>
                                        <small class="text-muted user-genre">
                                            <i class="bi bi-book me-1"></i>
                                            <?= !empty($u['genero_preferido']) ? htmlspecialchars($u['genero_preferido']) : 'Amante de los libros' ?>
                                        </small>
                                    </div>
                                </div>
                                <a href="index.php?c=MensajeController&a=chat&id=<?= $u['id'] ?>"
                                    class="btn btn-sm btn-outline-purple">
                                    <i class="bi bi-chat-dots me-1"></i>Iniciar chat
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($usuarios)): ?>
                        <div class="text-center py-5">
                            <i class="bi bi-people text-purple fs-1 opacity-50"></i>
                            <h6 class="mt-3">No hay usuarios disponibles</h6>
                            <p class="text-muted">Sé el primero en conectar</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Conversaciones activas -->
        <div class="col-md-6">
            <div class="card card-epic shadow-sm border-0">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="dynamic-title mb-3" id="conversations-title">
                        <i class="bi bi-chat-left-text-fill me-2"></i>
                        <?php if (count($conversaciones) > 0): ?>
                            Mis <?= count($conversaciones) ?> Conversaciones
                        <?php else: ?>
                            Mis Conversaciones
                        <?php endif; ?>
                    </h5>

                    <!-- Filtro de búsqueda para conversaciones -->
                    <?php if (count($conversaciones) > 0): ?>
                        <div class="search-container">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" class="form-control search-input" placeholder="Buscar en conversaciones..."
                                id="searchChats">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body" id="chatsList">
                    <?php foreach ($conversaciones as $usuario): ?>
                        <div class="chat-card p-3 chat-item">
                            <div class="d-flex align-items-center">
                                <div class="position-relative me-3">
                                    <img src="public/img/usuarios/<?= !empty($usuario['foto']) ? htmlspecialchars($usuario['foto']) : 'default.jpg' ?>"
                                        class="rounded-circle user-avatar" width="50" height="50"
                                        onerror="this.onerror=null;this.src='public/img/usuarios/default.jpg';">
                                    <div class="online-indicator"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-semibold chat-name"><?= htmlspecialchars($usuario['nombre']) ?>
                                        </h6>
                                        <div class="d-flex align-items-center gap-2">
                                            <?php if (!empty($usuario['mensajes_no_leidos'])): ?>
                                                <span class="badge badge-unread"><?= $usuario['mensajes_no_leidos'] ?></span>
                                            <?php endif; ?>
                                            <button class="delete-chat-btn" onclick="deleteChat(<?= $usuario['id'] ?>)"
                                                title="Eliminar conversación">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0 small text-truncate chat-message" style="max-width: 200px;">
                                        <i class="bi bi-chat-quote me-1"></i>
                                        <?= htmlspecialchars($usuario['ultimo_mensaje'] ?? 'Sin mensajes aún.') ?>
                                    </p>
                                </div>
                                <a href="index.php?c=MensajeController&a=chat&id=<?= $usuario['id'] ?>"
                                    class="btn btn-sm btn-primary">
                                    <i class="bi bi-arrow-right-circle me-1"></i>Continuar
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($conversaciones)): ?>
                        <div class="text-center py-5">
                            <i class="bi bi-chat-left-text text-purple fs-1 opacity-50"></i>
                            <h6 class="mt-3">No hay conversaciones activas</h6>
                            <p class="text-muted">Comienza a chatear con otros usuarios</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para eliminar chat
    function deleteChat(userId) {
        if (confirm('¿Estás seguro de que quieres eliminar esta conversación?')) {
            // Redirigir al controller para eliminar
            window.location.href = `index.php?c=MensajeController&a=eliminarChat&id=${userId}`;
        }
    }

    // Búsqueda de usuarios
    const searchUsers = document.getElementById('searchUsers');
    if (searchUsers) {
        searchUsers.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const userItems = document.querySelectorAll('.user-item');

            userItems.forEach(item => {
                const userName = item.querySelector('.user-name').textContent.toLowerCase();
                const userGenre = item.querySelector('.user-genre').textContent.toLowerCase();

                if (userName.includes(searchTerm) || userGenre.includes(searchTerm)) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.3s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    // Búsqueda de conversaciones
    const searchChats = document.getElementById('searchChats');
    if (searchChats) {
        searchChats.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const chatItems = document.querySelectorAll('.chat-item');

            chatItems.forEach(item => {
                const chatName = item.querySelector('.chat-name').textContent.toLowerCase();
                const chatMessage = item.querySelector('.chat-message').textContent.toLowerCase();

                if (chatName.includes(searchTerm) || chatMessage.includes(searchTerm)) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.3s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
</script>