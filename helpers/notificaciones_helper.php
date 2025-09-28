<?php
function obtenerNotificacionesUsuario($usuarioId) {
    require_once __DIR__ . '/../models/Notificacion.php';
    require_once __DIR__ . '/../models/Intercambio.php';
    require_once __DIR__ . '/../models/Libro.php';

    $notificacionModel = new Notificacion();
    $notificacionesRaw = $notificacionModel->obtenerPorUsuario($usuarioId);
    $notificaciones = [];
    foreach ($notificacionesRaw as $n) {
        // Asegura que los campos sean los que espera el layout y agrega id, leida, intercambio_id
        // Si la notificación es de tipo "aceptada/rechazada" y el link apunta a misIntercambios, usar la nueva acción para marcar como leída
        $link = $n['link'] ?? '';
        if (strpos($link, 'a=misIntercambios') !== false) {
            $link = 'index.php?c=IntercambioController&a=marcarNotificacionYRedirigir';
        } elseif (empty($link)) {
            $link = 'index.php?c=IntercambioController&a=notificaciones';
        }
        // Siempre agregar el parámetro noti=ID
        $sep = (strpos($link, '?') !== false) ? '&' : '?';
        $link_final = $link . $sep . 'noti=' . ($n['id'] ?? '');
        $notificaciones[] = [
            'id' => $n['id'] ?? null,
            'mensaje' => $n['mensaje'] ?? '',
            'link' => $link_final,
            'fecha' => !empty($n['fecha']) ? date('d/m/Y H:i', strtotime($n['fecha'])) : '',
            'leida' => $n['leida'] ?? 0,
            'intercambio_id' => $n['intercambio_id'] ?? null
        ];
    }

    return $notificaciones;
}
