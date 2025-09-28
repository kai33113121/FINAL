<link rel="stylesheet" href="public/css/chat.css">
<div class="chat-container">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic">
                    <div class="chat-header">
                        <div class="user-info">
                            <div class="position-relative">
                                <img src="public/img/usuarios/<?= !empty($otro_usuario['foto']) ? htmlspecialchars($otro_usuario['foto']) : 'default.jpg' ?>"
                                    class="user-avatar-large"
                                    onerror="this.onerror=null;this.src='public/img/usuarios/default.jpg';">
                                <div class="online-status"></div>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">Chat con <?= htmlspecialchars($otro_usuario['nombre']) ?></h4>
                                <p class="mb-0 opacity-75">
                                    <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem; color: #00d4aa;"></i>
                                    En línea
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="chat-messages" id="chatMessages">
                        <?php if (empty($mensajes)): ?>
                            <div class="empty-chat">
                                <i class="bi bi-chat-heart"></i>
                                <h5>¡Inicia la conversación!</h5>
                                <p>Sé el primero en enviar un mensaje a <?= htmlspecialchars($otro_usuario['nombre']) ?></p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($mensajes as $m): ?>
                                <div
                                    class="message-bubble <?= $m['emisor_id'] == $_SESSION['usuario']['id'] ? 'message-sent' : 'message-received' ?>">
                                    <div
                                        class="<?= $m['emisor_id'] == $_SESSION['usuario']['id'] ? 'bubble-sent' : 'bubble-received' ?>">
                                        <div class="message-author">
                                            <?= $m['emisor_id'] == $_SESSION['usuario']['id'] ? 'Tú' : htmlspecialchars($otro_usuario['nombre']) ?>
                                        </div>
                                        <div class="message-content">
                                            <?= nl2br(htmlspecialchars($m['mensaje'])) ?>
                                        </div>
                                        <div class="message-time">
                                            <?= date('H:i', strtotime($m['fecha_envio'])) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="typing-indicator" id="typingIndicator">
                            <i class="bi bi-three-dots"></i> <?= htmlspecialchars($otro_usuario['nombre']) ?> está
                            escribiendo...
                        </div>
                    </div>
                    <div class="chat-input-container">
                        <form method="POST" action="index.php?c=MensajeController&a=enviar" id="chatForm">
                            <input type="hidden" name="receptor_id" value="<?= $otro_usuario['id'] ?>">
                            <div class="row g-3 align-items-end">
                                <div class="col">
                                    <textarea name="mensaje" class="form-control chat-input" rows="2"
                                        placeholder="Escribe tu mensaje..." required id="messageInput"></textarea>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-send">
                                        <i class="bi bi-send me-2"></i>Enviar
                                    </button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="index.php?c=MensajeController&a=mensajes" class="btn btn-back">
                                    <i class="bi bi-arrow-left me-2"></i>Volver a mensajes
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function scrollToBottom() {
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    window.addEventListener('load', scrollToBottom);
    document.getElementById('messageInput').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            document.getElementById('chatForm').submit();
        }
    });
    let typingTimer;
    const typingIndicator = document.getElementById('typingIndicator');
    const messageInput = document.getElementById('messageInput');
    messageInput.addEventListener('input', function () {
        if (Math.random() > 0.7) {
            typingIndicator.style.display = 'block';
            scrollToBottom();
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                typingIndicator.style.display = 'none';
            }, 2000);
        }
    });
    messageInput.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    messageInput.focus();
</script>