<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- CSS -->
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../view/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/standardStyle.css"/>

        <!--Import jQuery before materialize.js-->
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
        <script src="//code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="../view/js/materialize.min.js"></script>
        <script type="text/javascript" src="../view/js/functions.js"></script>

    </head>
    <body>

        <form action="acao.php" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <i class="mdi-social-person prefix"></i>
                    <input id="nome" type="text" name="nome" class="validate">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <i class="mdi-social-people prefix"></i>
                    <input id="team" type="text" name="idade"  class="validate">
                    <label for="team">Team</label>
                </div>            
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Enviar
                <i class="mdi-content-send right"></i>
            </button>
        </form>



    </body>
</html>
