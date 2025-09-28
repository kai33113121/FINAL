<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$c = $_GET['c'] ?? null;
$a = $_GET['a'] ?? null;
if ($c && $a) {
    $controllerFile = "controllers/{$c}.php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (class_exists($c)) {
            $controller = new $c();
            if (method_exists($controller, $a)) {
                $controller->$a();
            } else {
                die("Error: No existe el método {$a} en {$c}.");
            }
        } else {
            die("Error: No existe la clase {$c}.");
        }
    } else {
        die("Error: No existe el archivo del controlador {$controllerFile}.");
    }
} else {
    include __DIR__ . '/views/auth/landing.php';
}

