<div class="col-md mx-auto p-5">
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
                        EDITAR 
                    </h4>
                </li>
            </ol>
        </nav>
        <div class="card ">
            <h5 class="card-header text-azulEscuro">
                Editar produto
            </h5>
            <div class="card-body bg-light">

                <form name="cadastrarProduto" method="POST" action="<?= URL ?>/produtos/editarProduto/<?= $dados['id'] ?>" class="mt-4">

                    <div class="form-group">
                        <label for="nomeProduto">Nome produto: <sup class="text-danger">*</sup></label>
                        <input type="text" name="nomeProduto" id="nomeProduto" value="<?= $dados['nomeProduto'] ?>" class="form-control <?= $dados['nomeProduto_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['nomeProduto_erro'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <input type="text" name="descricao" id="descricao" value="<?= $dados['descricao'] ?>" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="linkReceita">Link da Receita: </label>
                        <input type="text" name="linkReceita" id="linkReceita" value="<?= $dados['linkReceita'] ?>" class="form-control">

                    </div>

                    <input type="submit" value="Editar Produto" class="btn btn-info btn-block">

                </form>
            </div>
        </div>
    </div>
</div>