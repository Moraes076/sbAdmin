<?php

require_once './models/ConexaoBanco.php';

class UsuarioModel extends ConexaoBanco{

    function __construct(){
        parent::__construct();
    }

    function login($data){
        $sql = $this->conBD->prepare("SELECT * FROM usuario WHERE email=:email AND senha=:senha");
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':senha', $data['senha']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetch();

            $_SESSION['usuario_id'] = $result['id'];
            $_SESSION['usuario_nome'] = $result['nome'];

            return true;
        } else {
            return false;
        }
    }

    function selectById($id){
        $sql = $this->conBD->prepare("SELECT * FROM usuario WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch();
    }

    function updateImage($img_perfil){
        $user = $this->selectById($_SESSION['usuario_id']);
        if (file_exists($user['img_perfil'])) {
            unlink($user['img_perfil']);
        }

        $image_file = $img_perfil;
        $image_type = exif_imagetype($image_file["tmp_name"]);
        $image_extension = image_type_to_extension($image_type, true);
        $image_name = bin2hex(random_bytes(16)) . $image_extension;
        $upload_path = './uploads/users/' . $image_name;
        move_uploaded_file($image_file['tmp_name'], $upload_path);

        $sql = $this->conBD->prepare("UPDATE usuario SET img_perfil=:img_perfil WHERE id = :id");
        $sql->bindParam(':img_perfil', $upload_path);
        $sql->bindParam(':id', $_SESSION['usuario_id']);
        $sql->execute();

        $_SESSION['usuario_img'] = $upload_path;

        return $sql->rowCount();
    }
}
