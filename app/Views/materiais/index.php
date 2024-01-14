<div class="container col-md mx-auto p-5">

    <?= Sessao::mensagemErro('material') ?>
    <div class="card">
        <div class="card bg-azulEscuro ">
            <nav class="" aria-label="breadcrumb">
                <ol class="nav nav-pills">
                    <li class=" nav-item">
                        <h4>
                            <a class="nav-link text-white" href="<?= URL ?>/produtos">PRODUTOS</a>
                        </h4>
                    </li>
                    <li class=" nav-item">
                        <h4>
                            <a class="nav-link active bg-light text-primary" href="<?= URL ?>/materiais" aria-current="page">MATERIAIS</a>
                        </h4>
                    </li>

                </ol>
            </nav>

            <h4 class="card-header bg-azulEscuro text-white">
                MATERIAIS
                <div class="float-right">
                    <a href="<?= URL ?>/materiais/inserirMaterial" class="float-right btn btn-success">Cadastrar Material</a>
                </div>
            </h4>
            <div class="card-body bg-light p-1">


                <?php // foreach ($dados['material'] as $material) { 
                ?>
                <div class="card my-2">
                    <div class="card-body text-dark ">

                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <p class="card-text"></p>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-sm btn-outline-info float-right">Visualizar</a>
                    </div>
                </div>
                <?php //} 
                ?>

            </div>
        </div>
    </div>
</div>