<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <h5 class="card-header">
            Login
        </h5>
        <div class="card-body">
            <?= Sessao::mensagemErro('usuario') ?>
            <p class="card-text"><small class="text-muted">Informe seus dados para fazer login!</small></p>

            <form name="login" method="POST" action="<?= URL ?>/usuarios/login" class="mt-4">

                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['email_erro'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['senha_erro'] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <small>
                            <a  href="<?= URL ?>/usuarios/cadastrar">Ainda não tem uma conta? Cadastre-se</a>
                        </small>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>