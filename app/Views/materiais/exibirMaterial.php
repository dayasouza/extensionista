<div class="container col-md mx-auto p-5">
    <div class="card bg-azulEscuro ">
        <nav class="" aria-label="breadcrumb">
            <ol class="nav nav-pills">
                <li class="nav-item">
                    <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/produtos">PRODUTOS</a>
                    </h4>
                </li>
                <li class="nav-item">
                    <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/materiais">MATERIAIS</a>
                    </h4>
                </li>
                <li class="nav-link active bg-light text-primary" aria-current="page">
                    <h4><?= $dados['produto']->nomeProduto ?></h4>
                </li>
            </ol>
        </nav>

        <div class="card">
            <ol class="list-inline card-header">
                <li class="list-inline-item">
                    <h5 class="text-azulEscuro list-inline-item"><?= $dados['produto']->nomeProduto ?></h5>
                </li>
            </ol>

            <div class="card-body bg-light p-1">
                <?php foreach ($dados['materiais'] as $material) { ?>
                    <div class="card my-2">
                        <div class="card-body text-dark">
                            <h5 class="card-title"><?= $material->nomeMaterial ?></h5>
                            <p class="card-text">Preço: <?= $material->precoMaterial ?></p>
                            <p class="card-text">Quantidade: <?= $material->quantidadeMaterial ?></p>
                            <p class="card-text">Tipo: <?= $material->tipoMaterial ?></p>
                            <a href="#" class="btn btn-sm btn-outline-info float-right">Visualizar</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
