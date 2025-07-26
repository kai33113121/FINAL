<?php
session_start();

$c = $_GET['c'] ?? null;
$a = $_GET['a'] ?? null;

if ($c && $a) {
    require_once "controllers/{$c}.php";
    $controller = new $c();
    $controller->$a();
} else {
    if (isset($_SESSION['usuario'])) {
        header("Location: index.php?c=UsuarioController&a=dashboard");
    } else {
        include __DIR__ . '/views/auth/landing.php';
    }
}