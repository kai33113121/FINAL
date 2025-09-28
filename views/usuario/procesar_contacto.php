<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $asunto = $_POST['asunto'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';
    
    if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
        header("Location: index.php?c=UsuarioController&a=dashboard&error=campos_vacios");
        exit;
    }
    
    $destinatario = "libroswapgroup@gmail.com";
    $asunto_email = "Contacto LibrosWap - " . ucfirst($asunto);
    
    $mensaje_email = "
    Nuevo mensaje de contacto desde LibrosWap
    
    Nombre: $nombre
    Email: $email
    Asunto: $asunto
    
    Mensaje:
    $mensaje
    
    ---
    Enviado desde LibrosWap
    ";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($destinatario, $asunto_email, $mensaje_email, $headers)) {
        header("Location: index.php?c=UsuarioController&a=dashboard&success=mensaje_enviado");
    } else {
        header("Location: index.php?c=UsuarioController&a=dashboard&error=error_envio");
    }
    exit;
}
?>