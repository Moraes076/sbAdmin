<?php

require_once './models/Pessoa.php';

class PessoaController {
    protected $model;

    function __construct() {
        $this->model = new Pessoa();
    }

    function selectAll() {
        $result = $this->model->selectAll();
        var_dump($result);
    }
}