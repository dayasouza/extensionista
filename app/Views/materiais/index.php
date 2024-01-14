<div class="container col-md mx-auto p-5">

    <?= Sessao::mensagemErro('material') ?>
    <div class="card">
        <h4 class="card-header bg-azulEscuro text-white">
            MATERIAIS
            <div class="float-right">
                <a href="<?= URL ?>/materiais/inserirMaterial" class="float-right btn btn-success">Cadastrar Novo</a>
            </div>
        </h4>
        <div class="card-body bg-light p-1">


            <?php foreach ($dados['materiais'] as $material) { ?>


                <div class="card-body text-dark">
                    <p class="card-title d-inline font-weight-bold"><?= $material->nomeMaterial ?></p>
                    <p class="card-text d-inline ml-3">Preço Material: <?= $material->precoMaterial ?></p>
                    <p class="card-text d-inline ml-3">Quantidade Material: <?= $material->quantidadeMaterial ?></p>
                    <p class="card-text d-inline ml-3">Tipo Material: <?= $material->tipoMaterial ?></p>
            <hr>
                </div>

            <?php } ?>

        </div>
    </div>
</div>