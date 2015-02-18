<?php

/**
 * @package /controler/user.php
 * 
 * @since on 31/01/2015 
 * 
 * @author Igor Cesar <mixplick87@gmail.com>
 * @version 1.0.0 (31/01/2015 | 22:50)
 * 
 */

namespace controller;

use lib\conexao as conexao;
use model\user as game_model;

session_start();

class user {

    private $user;
    private $conn;

    function __construct() {
        $this->user = new game_model();
        $this->conn = new conexao();
        $this->conn->conecta();
    }

    public function actionCadastrar() {
        $this->user->setNome(utf8_decode(filter_input(INPUT_POST, 'nome')));
        $this->user->setEmail(filter_input(INPUT_POST, 'email'));
        $this->user->setTeam(filter_input(INPUT_POST, 'team'));
        $this->user->setTelefone(filter_input(INPUT_POST, 'cel'));
        $this->user->setLogin(utf8_decode(filter_input(INPUT_POST, 'login')));
        $this->user->setSenha(md5(filter_input(INPUT_POST, 'senha')));



        $this->conn->tabela = "user";
        $this->conn->campos = "name, email, team, celphone, login, pass";
        $this->conn->valores = ""
                . "'" . $this->user->getNome() . "',"
                . "'" . $this->user->getEmail() . "',"
                . "'" . $this->user->getTeam() . "',"
                . "'" . $this->user->getTelefone() . "',"
                . "'" . $this->user->getLogin() . "',"
                . "'" . $this->user->getSenha() . "'";

        $this->conn->insert();
    }

    public function actionAtualizar() {
        $this->user->setNome($_POST['nome']);
        $this->user->setEmail($_POST['email']);
        $this->user->setSenha(md5($_POST['senha']));
        $this->user->setEndereco($_POST['endereco']);
        $this->user->setTelefone($_POST['telefone']);

        $this->conn->tabela = "user";
        $this->campos = "
			nome  = '" . $this->user->getNome() . "', 
			email = '" . $this->user->getEmail() . "',
                        senha = '" . $this->user->getSenha() . "', 
			endereco = '" . $this->user->getEndereco() . "'
			telefone = '" . $this->user->getTelefone() . "'
		";

        $this->update();
    }

    public function actionListar() {
        $this->conn->tabela = "user";
        $this->conn->campos = "iduser, name, email, team, celphone";
        $this->asc = "name";
        $this->limit = 20;

        $this->select();
        $this->total();
    }

    public function actionBusca() {
        $this->conn->tabela = "user";
        $this->conn->campos = "*";
        $this->conn->asc = "email";
        $this->conn->where = "nome";
        $this->conn->like = $_POST['busca'];
        $this->conn->limit = 20;

        $this->select();
        $this->total();
    }

    public function actionDeletar() {
        $this->setId($_POST['id']);
        $this->tabela = TB_CLIENTE;

        $this->update();
    }

}
