<?php

require_once './models/Pessoa.php';

class PessoaController {
    protected $model;

    function __construct(){
        $this->model = new Pessoa();
    }

    function selectAll(){
        $result = $this->model->selectAll();
        require('./views/pessoaList.php');
    }

    function novaPessoa(){
        require('./views/pessoaForm.php');
    }

    function editar($id){
        $result = $this->model->selectById($id);
        require('./views/pessoaForm.php');
    }

    function insert($data){
        $result = $this->model->insert($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Pessoa inserida com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./pessoa.php');
    }

    function delete($id){
        $result = $this->model->delete($id);
        if ($result > 0) {
            $_SESSION['message'] = 'Pessoa excluída com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./pessoa.php');
    }

    function update($data){
        $result = $this->model->update($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Pessoa alterada com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./pessoa.php');
    }
}
