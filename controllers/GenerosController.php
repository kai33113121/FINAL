<?php
require_once __DIR__ . '/../models/Libro.php';

class GenerosController
{
    public function index()
    {
        if (!isset($_SESSION['usuario']['id'])) {
            header("Location: index.php?c=UsuarioController&a=login");
            exit;
        }
