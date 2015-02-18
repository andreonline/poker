<?php
include './includes/nav.php';
?>

<div class="conteudo">
    <div class="row">

        <?php
        for ($index = 0; $index < 14; $index++) {
            ?>



            <div class="col s12 m6 l3">
                <div class="card small teal">
                    <div class="col l3 white left"><i class="large mdi-social-person"></i></div>
                    <div class="white-text left" style="margin-left: 50px">
                        <p><span>Nome:</span> fulamodetal</p>
                        <p><span>Team:</span> PDM</p>
                        <p><span>Rank:</span> xxxx</p>
                    </div>
                    <div id="id-info" class="col s12 m12 l12 white">
                        <h5 class="teal-text"><em>Ultimo Torneio</em></h5>
                        <p><span>Posição:</span> <?php echo rand(01, 14); ?></p>
                        <p><span>Ganho: R$</span> <?php echo rand(20, 200); ?></p>
                        <p><span>Gasto: R$</span> <?php echo rand(20, 200); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>

<?php
include './includes/footer.php';
