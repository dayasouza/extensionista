<div class="container col-md mx-auto p-5">
    <div class="card bg-azulEscuro ">
        <nav class="" aria-label="breadcrumb">
            <ol class="nav nav-pills">
                <li class=" nav-item">
                    <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/produtos">PRODUTOS</a>
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
            <h5 class="card-header text-azulEscuro">
                <?= $dados['produto']->nomeProduto ?>
            </h5>
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
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="<?= URL . '/produtos/editarProduto/' . $dados['produto']->id ?>" class="btn btn-sm btn-primary btn-block">Editar</a>
                            </li>
                            <li class="list-inline-item">
                                <form action="<?= URL . '/produtos/deletar/' . $dados['produto']->id ?>">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                                </form>
                            </li>
                        </ul>
                    <?php }
                    ?>
                
            </div>
        </div>
    </div>
</div>