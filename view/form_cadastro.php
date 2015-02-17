<script>

    /*validação*/
//    $(document).ready(function () {
//
//        $('#cadastrar').validate({
//            rules: {
//                nome: {required: true},
//                email: {required: true, email: true},
//                senha: {required: true, rangelength: [6, 12]},
//                cel: {required: true},
//                team: {required: true},
//                login: {required: true}
//            },
//            messages: {
//                nome: {required: ''},
//                email: {required: '', email: "Digite um e-mail válido"},
//                senha: {required: '', rangelength: "Entre 6 e 12 caracteres"},
//                cel: {required: ''},
//                team: {required: ''},
//                login: {required: ''}
//            },
//            submitHandler: function (form) {
//                var dados = $(form).serialize();
//                $.ajax({
//                    type: "POST",
//                    url: "processa_user.php",
//                    data: dados,
//                    success: function () {
//                        if (dados == "I") {
//                            alert('Cadastro efetuado com sucesso!');
//                        } else {
//                            $("#contentee").html('');
//                            $("#contentee").append(dados);
//                        }
//                    },
//                    beforeSend: function () {
//                        $('.loading').fadeIn('fast');
//                    },
//                    complete: function () {
//                        $('.loading').fadeOut('fast');
//                    }
//
//                });
//
//                return false;
//            }
//        });
//    });
</script>


<div class="row" style="max-width: 1024px; min-height: 482px; margin-top: 8%">
    <form id="cadastrar" class="col s12" name="cadastrar" action="processa_user.php" method="post" >
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-social-person prefix "></i>
                <input id="nome" name="nome" type="text" class="validate" required>
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s6">
                <i class="mdi-social-people prefix "></i>
                <input id="team" name="team" type="text" class="validate" required>
                <label for="team">Team</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-action-settings-power prefix "></i>
                <input id="login" name="login" type="text" class="validate " required>
                <label for="login">Login</label>
            </div>

            <div class="input-field col s6">
                <i class="mdi-communication-vpn-key prefix "></i>
                <input id="senha" name="senha" type="password" class="validate " required>
                <label for="senha">Senha</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="mdi-content-markunread prefix "></i>
                <input id="email" name="email" type="email" class="validate " required>
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s6">
                <i class="mdi-communication-phone prefix "></i>
                <input id="cel" name="cel" type="tel" class="validate " required>
                <label for="cel" >Celular</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light right" type="submit">Enviar
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>