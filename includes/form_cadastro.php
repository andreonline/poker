<script>
    submitHandler: function(form){
        var dados = $(form).serialize();
        $.ajax({
            type: "POST",
            url: "processa_ncliente.php",
            data: dados,
            success: function (dados) {
                if (dados == "I") {
                    alert('Cadastro efetuado com sucesso!');
//                    window.location = "<?= $pagina ?>";
                } else {
                    $("#contentee").html('');
                    $("#contentee").append(dados);
                }
            },
            beforeSend: function () {
                $('.loading').fadeIn('fast');
            },
            complete: function () {
                $('.loading').fadeOut('fast');
            }

        });
    }
</script>


<div class="row" style="max-width: 1024px; min-height: 482px; margin-top: 8%">
    <form id="cadastrar" class="col s12" name="cadastrar" action="cadastro.php" method="post">
        <input type="hidden" id="action" name="action" />
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-social-person prefix"></i>
                <input id="nome" type="text" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s6">
                <i class="mdi-social-people prefix"></i>
                <input id="team" type="text" class="validate">
                <label for="team">Team</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-action-settings-power prefix"></i>
                <input id="login" type="text" class="validate">
                <label for="login">Login</label>
            </div>

            <div class="input-field col s6">
                <i class="mdi-communication-vpn-key prefix"></i>
                <input id="senha" type="password" class="validate">
                <label for="senha">Senha</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-content-markunread prefix"></i>
                <input id="email" type="email" class="validate">
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s6">
                <i class="mdi-communication-phone prefix"></i>
                <input id="cel" type="tel" class="validate">
                <label for="cel">Celular</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light right" 
                onclick="javascript:doPost('cadastrar', 'actionCadastrar')"
                type="submit" name="action">Enviar
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>