<?php
function obtenerNotificacionesUsuario($usuarioId) {
    require_once __DIR__ . '/../models/Notificacion.php';
    require_once __DIR__ . '/../models/Intercambio.php';
    require_once __DIR__ . '/../models/Libro.php';

    $notificacionModel = new Notificacion();
    $notificacionesRaw = $notificacionModel->obtenerPorUsuario($usuarioId);
    $notificaciones = [];
    foreach ($notificacionesRaw as $n) {
        // Asegura que los campos sean los que espera el layout
        $notificaciones[] = [
            'mensaje' => $n['mensaje'] ?? '',
            'link' => $n['link'] ?? 'index.php?c=IntercambioController&a=notificaciones',
            'fecha' => !empty($n['fecha']) ? date('d/m/Y H:i', strtotime($n['fecha'])) : ''
        ];
    }

    $intercambio = new Intercambio();
    $libroModel = new Libro();
    $pendientes = $intercambio->obtenerPendientes($usuarioId);
    foreach ($pendientes as $notif) {
        $libroOfrecido = $libroModel->obtenerPorId($notif['libro_id_1']);
        $libroSolicitado = $libroModel->obtenerPorId($notif['libro_id_2']);
        $tituloOfrecido = $libroOfrecido && isset($libroOfrecido['titulo']) ? $libroOfrecido['titulo'] : 'Libro ofrecido';
        $tituloSolicitado = $libroSolicitado && isset($libroSolicitado['titulo']) ? $libroSolicitado['titulo'] : 'Libro solicitado';

        $notificaciones[] = [
            'mensaje' => "Solicitud de intercambio #{$notif['id']}: \"{$tituloOfrecido}\" por \"{$tituloSolicitado}\"",
            'link' => "index.php?c=IntercambioController&a=notificaciones",
            'fecha' => !empty($notif['fecha']) ? date('d/m/Y H:i', strtotime($notif['fecha'])) : ''
        ];
    }
    return $notificaciones;
}
