<?php

if (isset($_SESSION) == false) {
    session_start();
}

 

require_once './controller/UsuarioController.php';

$controller = new UsuarioController();

$action = '';
if ( isset( $_GET['action'] )) {
    $action = $_GET['action'];
}

if (isset($_SESSION['usuario_id'])) {
    header('Location: ./home.php');
    exit;
}       

if ($action == 'login') {
    if (isset($_POST['email']) && isset( $_POST['senha'])) {
        $controller->login($_POST);
    }
} else {
    header('Location: ./login.php');
    exit;
}