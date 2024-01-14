<div class="col-md mx-auto p-5">
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
                        <a class="nav-link text-white" href="<?= URL ?>/materiais">MATERIAIS</a>
                    </h4>
                </li>
                <li class="nav-link active bg-light text-primary" aria-current="page">
                    <h4>
                    <?= $dados['material']->nomeProduto ?>
                    </h4>
                </li>
                <li class="nav-link active bg-light text-primary" aria-current="page">
                    <h4>
                        CADASTRAR MATERIAL
                    </h4>
                </li>
            </ol>
        </nav>
        <div class="card ">
            <h5 class="card-header text-azulEscuro">
                Cadastrar material
            </h5>
            <div class="card-body bg-light">

                <form name="inserirMaterial" method="POST" action="<?= URL ?>/produtos/inserirMaterial" class="mt-4">

                    <div class="form-group">
                        <label for="nomeMaterial">Nome do material: <sup class="text-danger">*</sup></label>
                        <input type="text" name="nomeMaterial" id="nomeMaterial" value="<?= $dados['nomeMaterial'] ?>" class="form-control <?= $dados['nomeMaterial_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['nomeMaterial_erro'] ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="precoMaterial">Preço do Material: </label>
                        <input type="text" name="precoMaterial" id="precoMaterial" value="<?= $dados['precoMaterial'] ?>" class="form-control <?= $dados['precoMaterial_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['precoMaterial_erro'] ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="quantidadeMaterial">Quantidate: </label>
                        <input type="text" name="quantidadeMaterial" id="quantidadeMaterial" value="<?= $dados['quantidadeMaterial'] ?>" class="form-control <?= $dados['quantidadeMaterial_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['quantidadeMaterial_erro'] ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="tipoMaterial">Tipo: </label>
                        <input type="text" name="tipoMaterial" id="tipoMaterial" value="<?= $dados['tipoMaterial'] ?>" class="form-control <?= $dados['tipoMaterial_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['tipoMaterial_erro'] ?>
                        </div>

                    </div>

                

                    <input type="submit" value="Inserir Material" class="btn btn-info btn-block">

                </form>
            </div>
        </div>
    </div>
</div>