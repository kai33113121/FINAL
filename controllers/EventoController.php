<?php
require_once __DIR__ . '/../models/Evento.php';
require_once __DIR__ . '/../models/ComentarioEvento.php';
class EventoController
{
    public function crear()
    {
        $evento = new Evento();
        $eventos = $evento->obtenerActivos();
        $contenido = __DIR__ . '/../views/admin/crear_evento.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function guardar()
    {
        $evento = new Evento();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $creado_por = $_SESSION['usuario']['id'] ?? null;
            $evento->crear($titulo, $descripcion, $creado_por);
        }
        $eventos = $evento->obtenerActivos();
        $contenido = __DIR__ . '/../views/admin/crear_evento.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function listar()
    {
        $evento = new Evento();
        $eventos = $evento->obtenerActivos();
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = [];
        if (isset($_SESSION['usuario']['id'])) {
            $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        }
        $contenido = __DIR__ . '/../views/usuario/lista_eventos.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function ver()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Evento no encontrado";
            exit;
        }
        $evento = new Evento();
        $comentario = new ComentarioEvento();
        $datosEvento = $evento->obtenerPorId($id);
        $comentarios = $comentario->obtenerPorEvento($id);
        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = [];
        if (isset($_SESSION['usuario']['id'])) {
            $notificaciones = obtenerNotificacionesUsuario($_SESSION['usuario']['id']);
        }
        $contenido = __DIR__ . '/../views/usuario/evento_detalle.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }
    public function comentar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comentario = new ComentarioEvento();
            $id_evento = $_POST['id_evento'];
            $id_usuario = $_SESSION['usuario']['id'];
            $texto = $_POST['comentario'];
            $comentario->agregar($id_evento, $id_usuario, $texto);
        }
        header("Location: index.php?c=EventoController&a=ver&id=" . $_POST['id_evento']);
        exit;
    }
    public function editar()
    {
        $id = $_GET['id'] ?? null;
        $evento = new Evento();
        $foro = $evento->obtenerPorId($id);
        $contenido = __DIR__ . '/../views/admin/editar_evento.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $evento = new Evento();
            $evento->actualizar($id, $titulo, $descripcion);
        }
        $eventos = (new Evento())->obtenerActivos();
        $contenido = __DIR__ . '/../views/admin/crear_evento.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
    public function eliminar()
    {
        $id = $_GET['id'] ?? null;
        $evento = new Evento();
        $evento->eliminar($id);
        $eventos = $evento->obtenerActivos();
        $contenido = __DIR__ . '/../views/admin/crear_evento.php';
        include __DIR__ . '/../views/layouts/layout_admin.php';
    }
}