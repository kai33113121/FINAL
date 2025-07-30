<?php
require_once __DIR__ . '/../models/VentaModelo.php';

class VentaController {
    private $ventaModel;

    public function __construct() {
        $this->ventaModel = new Venta();
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;

            // Subida de imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $nombreImagen = uniqid() . "_" . basename($_FILES['imagen']['name']);
                $rutaDestino = "../public/img/" . $nombreImagen;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
                $datos['imagen'] = $rutaDestino;
            } else {
                $datos['imagen'] = "public/img/default.jpg";
            }

            // Guardar en la base de datos
            $this->ventaModel->crear($datos);

            echo "<script>alert('✅ Libro guardado con éxito'); window.location.href='../views/usuarios/Venta_libro.php';</script>";
        }
    }
}

// ⚠️ Código para ejecutar automáticamente cuando se accede al archivo directamente
// Este bloque se ejecuta solo si vienes por el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new VentaController();
    $controlador->crear();
}
?>

