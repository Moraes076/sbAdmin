<?php

require_once './controller/PessoaController.php';

$controller = new PessoaController();

$action = 'listar';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// AÇÕES
switch ($action) {
    case 'listar':
        $controller->selectAll();
        break;
    case 'adicionar':
        $controller->novaPessoa();
        break;
    case 'insert':
        $controller->insert($_POST);
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
}