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

if (isset($_SESSION['usuario_id']) || $action=='login') {
    switch ($action) {
        case 'logout':
            $controller->logout();
            break;
        case 'login':
            if (isset($_POST['email']) && isset($_POST['senha'])) {
                $controller->login($_POST);
            }
            break;
        case 'perfil':
            $controller->perfil();
            break; 
        case 'upload':
            if(isset($_FILES['img-perfil'])) {
                $controller->upload($_FILES['img-perfil']);
            }
            break;
        default:
            header('Location: ./home.php');
            break;
    }
} else {
    header('Location: ./login.php');
    exit;
}