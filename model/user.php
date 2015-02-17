<?php

/**
 * @package /model/user.php
 * 
 * @since on 31/01/2015 
 * 
 * @author Igor Cesar <mixplick87@gmail.com>
 * @version 1.0.0 (31/01/2015 | 22:40)
 * 
 */

namespace model;

class user {

    private $nome;
    private $email;
    private $team;
    private $telefone;
    private $login;
    private $senha;

# seters 

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTeam($team) {
        $this->team = $team;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

# geters

    public function __get($name) {
        return $this->$name;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTeam() {
        return $this->team;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

}
