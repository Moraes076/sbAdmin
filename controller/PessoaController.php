<?php

require_once './models/Pessoa.php';

class PessoaController {
    protected $model;

    function __construct() {
        $this->model = new Pessoa();
    }

    function selectAll() {
        $result = $this->model->selectAll();
        require('./views/pessoaList.php');
    }

    function novaPessoa() {
        require('./views/pessoaForm.php');
    }

    function insert($data) {
        $result = $this->model->insert($data);
        header('Location: ./pessoa.php');
    }

    function delete($id) {
        $result = $this->model->delete($id);
        header('Location: ./pessoa.php');
    }
}