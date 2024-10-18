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
    case 'editar':
        if (isset($_GET['id'])) {
            $controller->editar($_GET['id']);
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
    case 'update':
        if (isset($_POST['id'])) {
            $controller->update($_POST);
        }
        break;
    default:
        echo 'Erro 404: Página não encontrada.';
        break;
}