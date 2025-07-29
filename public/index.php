<?php
session_start();

spl_autoload_register(function ($class) {
    if (file_exists("../controllers/$class.php")) {
        require_once "../controllers/$class.php";
    } elseif (file_exists("../models/$class.php")) {
        require_once "../models/$class.php";
    }
});

$controlador = isset($_GET['c']) ? $_GET['c'] : 'UsuarioController';
$accion = isset($_GET['a']) ? $_GET['a'] : 'landing';

$controlador = new $controlador();
call_user_func([$controlador, $accion]); 