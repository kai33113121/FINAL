<?php
require_once __DIR__ . '/../models/Compra.php';

class CompraController
{

    public function index()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $compraModel = new Compra();
        $id_usuario = $_SESSION['usuario']['id'];

        $compras = $compraModel->obtenerDetallado($id_usuario);

        require_once __DIR__ . '/../helpers/notificaciones_helper.php';
        $notificaciones = obtenerNotificacionesUsuario($id_usuario);

        $contenido = __DIR__ . '/../views/usuario/mis_compras.php';
        include __DIR__ . '/../views/layouts/layout_usuario.php';
    }

    public function detalle()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }

        $compra_id = $_GET['id'] ?? null;
        if (!$compra_id) {
            header("Location: index.php?c=CompraController&a=index");
            exit;
        }

        $compraModel = new Compra();
        $detalles = $compraModel->obtenerDetalleCompra($compra_id);

        // Verificar que la compra pertenece al usuario
        if (!empty($detalles)) {
    