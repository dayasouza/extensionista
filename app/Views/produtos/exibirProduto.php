<div class="container col-md mx-auto p-5">
    <div class="card bg-azulEscuro ">
        <nav class="" aria-label="breadcrumb">
            <ol class="nav nav-pills">
                <li class=" nav-item">
                    <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/produtos">PRODUTOS</a>
                    </h4>
                </li>
                <li class=" nav-item" >
                <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/materiais">MATERIAIS</a>
                    </h4>
                </li>
                <li class="nav-link active bg-light text-primary" aria-current="page">
                    <h4>

                        <?= $dados['produto']->nomeProduto ?>
                    </h4>
                </li>
            </ol>
        </nav>

        <div class="card">

            <ol class="list-inline card-header">
                <li class="list-inline-item ">
                    <h5 class="text-azulEscuro list-inline-item">
                        <?= $dados['produto']->nomeProduto ?></h5>
                </li>

                <?php
                if ($dados['produto']->usuario_id == $_SESSION['usuario_id']) { ?>

                    <li class="list-inline-item text-right mx-5">
                        <a href="<?= URL . '/produtos/editarProduto/' . $dados['produto']->id ?>" class="btn btn-sm btn-primary btn-block">Editar</a>
                    </li>
                    <li class="list-inline-item justify-content-end">
                        <form action="<?= URL . '/produtos/deletar/' . $dados['produto']->id ?>" method="POST">
                            <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                        </form>
                    </li>
            </ol>
        <?php }
        ?>


        <div class="card-body bg-light p-1 center">

            <div class="card my-2">
                <div class="card-body text-dark ">
                    <p class="card-text"><?= $dados['produto']->descricao ?></p>
                    <p class="card-text"><?= $dados['produto']->linkReceita ?></p>
                </div>
                <small class="card-footer text-muted ">
                    Criado em: <?= Valida::dataBr($dados['produto']->criado_em) ?>
                </small>
            </div>
            <?php
            if ($dados['produto']->usuario_id == $_SESSION['usuario_id']) { ?>
                <a href="<?= URL . '/materiais/inserirMaterial/' . $dados['produto']->id ?>" class="btn btn-success btn-block">Incluir Material</a>

            <?php }
            ?>
        </div>
        </div>
    </div>
</div>