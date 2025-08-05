<?php
require_once __DIR__ . '/../models/LibroCatalogo.php';
require_once __DIR__ . '/../models/Venta.php';

class LibroController {
    private $catalogoModel;
    private $ventaModel;

    public function __construct() {
        $this->catalogoModel = new LibroCatalogo(conectar());
        $this->ventaModel = new Venta(); // Ya se conecta internamente
    }

    public function explorar() {
    $libros_catalogo = $this->catalogoModel->obtenerTodos();
    $libros_venta = $this->ventaModel->obtenerTodos();

    $contenido = __DIR__ . '/../views/usuario/explorar.php';
    require_once __DIR__ . '/../views/layouts/layout_usuario.php';
}
}