
<div class="container col-md mx-auto p-5">

    <?= Sessao::mensagemErro('material') ?>

    <div class="card bg-azulEscuro ">
        <nav class="" aria-label="breadcrumb">
            <ol class="nav nav-pills">
                <li class=" nav-item">
                    <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/produtos">PRODUTOS</a>
                    </h4>
                </li >
                <li class=" nav-item" >
                <h4>
                        <a class="nav-link text-white" href="<?= URL ?>/materiais">MATERIAIS</a>
                    </h4>
                </li>
                <li class="nav-link active bg-light text-primary" aria-current="page">
                    <h4>
                    <?= isset($dados['produto']->nomeProduto) ? $dados['produto']->nomeProduto : '' ?>
                    </h4>
                </li>
            </ol>
        </nav>

        <div class="card">
            <ol class="list-inline card-header">
                <li class="list-inline-item">
                    <h5 class="text-azulEscuro list-inline-item">Inserir Material</h5>
                </li>
            </ol>

            <div class="card-body bg-light p-1">
                <form method="POST" action="<?= URL ?>/materiais/inserirMaterial/<?= $dados['produto']->id ?>">
                    <div class="form-group">
                        <label for="nomeMaterial">Nome do Material: <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control <?= $dados['nomeMaterial_erro'] ? 'is-invalid' : '' ?>" id="nomeMaterial" name="nomeMaterial" value="<?= $dados['nomeMaterial'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="precoMaterial">Preço do Material: <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control <?= $dados['precoMaterial_erro'] ? 'is-invalid' : '' ?>" id="precoMaterial" name="precoMaterial" value="<?= $dados['precoMaterial'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="quantidadeMaterial">Quantidade do Material: <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control <?= $dados['quantidadeMaterial_erro'] ? 'is-invalid' : '' ?>" id="quantidadeMaterial" name="quantidadeMaterial" value="<?= $dados['quantidadeMaterial'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="tipoMaterial">Tipo do Material: <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control <?= $dados['tipoMaterial_erro'] ? 'is-invalid' : '' ?>" id="tipoMaterial" name="tipoMaterial" value="<?= $dados['tipoMaterial'] ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Inserir Material</button>
                </form>
            </div>
        </div>
    </div>
</div>
