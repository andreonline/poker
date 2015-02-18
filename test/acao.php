<!DOCTYPE html>
<?php
include_once '../bootstrap.php';

use model\user as user_model;
use lib\conexao as conexao;

$model = new user_model();

$nome = filter_input(INPUT_POST, 'nome');
$senha = md5(filter_input(INPUT_POST, 'idade'));

$model->setNome($nome);
$model->setSenha($senha);

$con = new conexao;
$con->tabela = "user";

$con->campos = "name, pass";
$con->valores = "'" . $model->getNome() . "' ,'" . $model->getSenha() . "'";

$con->insert();

if ($con->resultado) {
    print_r($con->resultado);
} else {
    echo "deu merda!";
}


$conn->valores = "'" . $user->getNome() . "','" . $user->getEmail() . "','" . $user->getTeam() . "','" . $user->getTelefone() . "','" . $user->getLogin() . "','" . $user->getSenha() . "'";
