<?php
function verificarSeguridadSesion() {
    if (!isset($_SESSION['usuario'])) {
        return false;
    }
    if (isset($_SESSION['ultima_actividad'])) {
        if (time() - $_SESSION['ultima_actividad'] > 1800) {
            cerrarSesionSegura();
            return false;
        }
    }
    $_SESSION['ultima_actividad'] = time();
    if (isset($_SESSION['user_agent'])) {
        if ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
            cerrarSesionSegura();
            return false;
        }
    } else {
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    }
    return true;
}
function cerrarSesionSegura() {
    session_destroy();
    header("Location: index.php?c=UsuarioController&a=login&msg=sesion_expirada");
    exit;
}
?>