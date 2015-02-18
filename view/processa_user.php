<?php
include_once '../bootstrap.php';

use lib\conexao as conexao;
use controller\user as user_cont;

$funcao = filter_input(INPUT_POST, 'action');

if (function_exists($funcao)) {
    call_user_func($funcao);
}

$login = filter_input(INPUT_POST, 'login');
$email = (filter_input(INPUT_POST, 'email'));


$con = new conexao;
$query = "SELECT login, email FROM user WHERE login='" . $login . "' OR email='" . $email . "'";
$con->sql_query($query);
$x = mysql_num_rows($con->resultado);

if ($x == 0) {
    $user = new user_cont();
    $user->actionCadastrar();
    $y = TRUE;
} else {
    $y = FALSE;
}


if ($y) {
    include './nav.php';
    ?>
    <div class="row">
        <div class="container">
            <div class="col s12 m5 offset-l3">
                <div class="card small">
                    <div class="card-image">
                        <img src="images/sample-1.jpg">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p>Cadastro efetuado com sucesso.</p>
                        <p>Fique de olho no portal para se manter informado sobre os torneios e eventos do club.</p>
                    </div>
                    <div class="card-action">
                        <a class="right" href='home'>Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "<script type='text/javascript'> alert('Usuario ou e-mail já cadastrado!');</script>";
    echo "<script type='text/javascript'> window.location = 'cadastro.php';</script>";
}
