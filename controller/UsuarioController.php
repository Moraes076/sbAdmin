<?php

require_once './models/Usuario.php';

class UsuarioController {

    protected $model;

    function __construct() {
        $this->model = new UsuarioModel;
    }

    function login($data) {
        $result = $this->model->login($data);

        if ($result == false) {
            $_SESSION['login_error'] = 'Usuário ou senha inválidos';
        } else {
            unset($_SESSION['login_error']);
        }    

        header('Location: ./index.php');
        }

        function logout() {
            session_destroy();
            header('Location: ./index.php');
    }

    function perfil() {
        $id = $_SESSION['usuario_id'];
        $result = $this->model->selectById($id);
        require('./views/usuario-perfil.php');
    }

    function upload($img_perfil) {
        $result = $this->model->updateImage($img_perfil);
        header('Location: ./index.php?action=perfil');
    }
}