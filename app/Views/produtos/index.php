<div class="container col-md mx-auto p-5">
    <?= Sessao::mensagemErro('produto') ?>
    <div class="card">
        <h4 class="card-header bg-azulEscuro text-white">
            PRODUTOS
            <div class="float-right">
                <a href="<?= URL ?>/produtos/cadastrarProduto" class="float-right btn btn-success">Cadastrar Novo</a>
            </div>
        </h4>
        <div class="card-body bg-light p-1">
            <?php foreach ($dados['produtos'] as $produto) { ?>
                <div class="card my-2">
                    <div class="card-body text-dark ">
                        <h5 class="card-title"><?= $produto->nomeProduto ?></h5>
                        <p class="card-text"><?= $produto->descricao ?></p>
                        <a href="#" class="btn btn-sm btn-outline-info float-right">Visualizar</a>
                    </div>
                    <small class="card-footer text-muted ">
                    Criado em: <?= date('d/m/Y H:i', strtotime($produto-> dataCadatroProduto)) ?>
                    </small>
                </div>
            <?php } ?>
        </div>
    </div>
</div>