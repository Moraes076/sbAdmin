<?php

require_once './models/ConexaoBanco.php';

class Pessoa extends ConexaoBanco {
    function __construct(){
        parent::__construct();
    }

    function selectAll() {
        $sql = $this->conBD->prepare("SELECT * FROM pessoa ORDER BY nome");
        $sql->execute();
        return $sql->fetchAll();
        

    }
}