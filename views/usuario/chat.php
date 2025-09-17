<style>
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --purple: #6a11cb;
        --purple-light: #f8f4ff;
    }

    .chat-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 80vh;
        padding: 20px 0;
    }

    .chat-header {
        background: var(--gradient-primary);
        color: white;
        border-radius: 20px 20px 0 0;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .chat-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('/FINAL/public/img/adminside.png') center/cover;
        opacity: 0.1;
    }

    .chat-header * {
        position: relative;
        z-index: 2;
    }

    .chat-messages {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        max-height: 500px;
        overflow-y: auto;
        padding: 20px;
        border: none;
        scroll-behavior: smooth;
    }

    .chat-messages::-webkit-scrollbar {
        width: 8px;
    }

    .chat-messages::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
        background: var(--purple);
        border-radius: 10px;
    }

    .message-bubble {
        margin-bottom: 15px;
        animation: fadeInMessage 0.3s ease;
    }

    .message-sent {
        text-align: right;
    }

    .message-received {
        text-align: left;
    }

    .bubble-sent {
        background: var(--gradient-primary);
        color: white;
        border-radius: 20px 20px 5px 20px;
        padding: 12px 18px;
        display: inline-block;
        max-width: 70%;
        word-wrap: break-word;
        box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
    }

    .bubble-received {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        color: #333;
        border-radius: 20px 20px 20px 5px;
        padding: 12px 18px;
        display: inline-block;
        max-width: 70%;
        word-wrap: break-word;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .message-author {
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 5px;
        opacity: 0.8;
    }

    .message-time {
        font-size: 0.75rem;
        opacity: 0.7;
        margin-top: 5px;
    }

    .chat-input-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 0 0 20px 20px;
        padding: 20px;
        border: none;
    }

    .chat-input {
        border: 2px solid rgba(106, 17, 203, 0.2);
        border-radius: 25px;
        padding: 15px 20px;
        resize: none;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .chat-input:focus {
        border-color: var(--purple);
        box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        background: white;
        outline: none;
    }

    .btn-send {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-send::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gradient-secondary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-send:hover::before {
        opacity: 1;
    }

    .btn-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(106, 17, 203, 0.3);
        color: white;
    }

    .btn-send * {
        position: relative;
        z-index: 2;
    }

    .btn-back {
        background: rgba(106, 17, 203, 0.1);
        border: 2px solid var(--purple);
        color: var(--purple);
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-back:hover {
        background: var(--purple);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(106, 17, 203, 0.3);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-avatar-large {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    .online-status {
        width: 12px;
        height: 12px;
        background: #00d4aa;
        border: 2px solid white;
        border-radius: 50%;
        position: absolute;
        bottom: 5px;
        right: 5px;
        animation: pulse-green 2s infinite;
    }

    @keyframes pulse-green {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 212, 170, 0.7);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(0, 212, 170, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(0, 212, 170, 0);
        }
    }

    @keyframes fadeInMessage {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .empty-chat {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-chat i {
        font-size: 4rem;
        color: var(--purple);
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .typing-indicator {
        display: none;
        padding: 10px 20px;
        font-style: italic;
        color: #666;
        background: rgba(106, 17, 203, 0.1);
        border-radius: 20px;
        margin: 10px 0;
        animation: pulse 2s infinite;
    }

    .card-epic {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
</style>

<div class="chat-container">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-epic">

                    <!-- Chat Header -->
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

                    <!-- Chat Messages -->
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

                        <!-- Indicador de escritura -->
                        <div class="typing-indicator" id="typingIndicator">
                            <i class="bi bi-three-dots"></i> <?= htmlspecialchars($otro_usuario['nombre']) ?> está
                            escribiendo...
                        </div>
                    </div>

                    <!-- Chat Input -->
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