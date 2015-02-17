<?php
$valores = array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100);
?>

<div class="row" style="max-width: 1024px; margin-top: 8%">
    <form id="cadastrar" class="col s12" name="cadastrar" action="processa_game.php" method="post">
        <input type="hidden" id="action" name="action" />

        <div class="row">
            <div class="col s6">
                <input class="with-gap" name="tipo" type="radio" id="cash" />
                <label for="cash">Cash</label>
            </div>

            <div class="col s6">
                <input class="with-gap" name="tipo" type="radio" id="torneio" />
                <label for="torneio">Torneio</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-action-home prefix"></i>
                <input id="team" name="local" type="text" class="validate" required>
                <label for="local">Local</label>
            </div>

            <div class="col s6">
                <label>Buy-In</label>
                <select class='browser-default'>
                    <option value='' disabled selected>Escolha o Buy-In</option>

                    <?php
                    foreach ($valores as $value) {
                        echo "<option  value='$value'>R$ $value</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col s6">
                <label>Re-Buy</label>
                <select class='browser-default'>
                    <option value='' disabled selected>Escolha o Re-Buy</option>

                    <?php
                    foreach ($valores as $value) {
                        echo "<option  value='$value'>R$ $value</option> ";
                    }
                    ?>
                </select>
            </div>


            <div class="col s6">

                <label>Add-On</label>
                <select class='browser-default'>
                    <option value='' disabled selected>Escolha o Add-On</option>

                    <?php
                    foreach ($valores as $value) {
                        echo "<option  value='$value'>R$ $value</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col s3" style="margin: 3%">
                <input type="checkbox" id="player" />
                <label for="player">Mixplick</label>
            </div>


            <div class="col s3">
                <label>Re-Buy</label>
                <select class='browser-default'>
                    <option value='' disabled selected>Quantidade</option>

                    <?php
                    for ($index = 0; $index < 21; $index++) {
                        echo "<option  value='$index'> $index </option> ";
                    }
                    ?>
                </select>
            </div>

            <div class="col s3" style="margin: 0.25%">
                <label class="left">Add-On</label>
                <div style="clear: both"></div>
                <div style="margin: 5%"></div>
                <div class="col s6">
                    <input class="with-gap" name="addon" type="radio" id="sim" />
                    <label for="sim">Sim</label>
                </div>

                <div class="col s6">
                    <input class="with-gap" name="addon" type="radio" id="nao" />
                    <label for="nao">Não</label>
                </div>
            </div>
        </div>






        <button class="btn waves-effect waves-light right" type="submit">Enviar
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>



