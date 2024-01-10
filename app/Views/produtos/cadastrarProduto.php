<div class="col-md-12 mx-auto p-5">
    <nav class="bg-azulClaro text-white" aria-label="breadcrumb">
        <ol class="nav nav-pills">
            <li class=" nav-item "><a class="nav-link" href="<?= URL ?>/produtos">Produtos</a></li>
            <li class="nav-link active" aria-current="page">Cadastrar Novo</li>
        </ol>
    </nav>
    <div class="card">
        <h5 class="card-header bg-azulEscuro text-white">
            CADASTRAR NOVO PRODUTO
        </h5>
        <div class="card-body bg-light">

            <form name="cadastrarProduto" method="POST" action="<?= URL ?>/produtos/cadastrarProduto" class="mt-4">

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

                <input type="submit" value="Cadastrar" class="btn btn-primary btn-block">

            </form>
        </div>
    </div>
</div>