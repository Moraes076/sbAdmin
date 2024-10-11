<?php

require_once './controller/PessoaController.php';

$controller = new PessoaController();

$action = 'listar';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// AÇÕES
if ($action == 'listar') {
    $controller->selectAll();
}
