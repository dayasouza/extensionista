<div class="col-xl-8 col-md-6 mx-auto p-5">
    <div class="card">
        <h5 class="card-header">Cadastre-se</h5>
        <div class="card-body">
            <p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer seu cadastro</small></p>
            <form name="cadastrar" method="POST" action="<?= URL ?>/usuarios/cadastrar" class="mt-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= $dados['nome'] ?>" placeholder="Nome">
                            <div class="invalid-feedback">
                                <?= $dados['nome_erro'] ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control <?= $dados['sobrenome_erro'] ? 'is-invalid' : '' ?>" id="sobrenome" name="sobrenome" value="<?= $dados['sobrenome'] ?>" placeholder="Sobrenome">
                            <div class="invalid-feedback">
                                <?= $dados['sobrenome_erro'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nascimento">Data Nascimento</label>
                            <input type="date" class="form-control <?= $dados['nascimento_erro'] ? 'is-invalid' : '' ?>" id="nascimento" name="nascimento" value="<?= $dados['nascimento'] ?>">
                            <div class="invalid-feedback">
                                <?= $dados['nascimento_erro'] ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="artesanato">Tipo de Artesanato</label>
                            <input type="text" class="form-control <?= $dados['artesanato_erro'] ? 'is-invalid' : '' ?>" id="artesanato" name="artesanato" value="<?= $dados['artesanato'] ?>" placeholder="Tipo de negocio artesanal">
                            <div class="invalid-feedback">
                                <?= $dados['artesanato_erro'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="empresa">Nome da sua Empresa</label>
                            <input type="text" class="form-control <?= $dados['empresa_erro'] ? 'is-invalid' : '' ?>" id="empresa" name="empresa" value="<?= $dados['empresa'] ?>" placeholder="Nome do seu negócio artesanal">
                            <div class="invalid-feedback">
                                <?= $dados['empresa_erro'] ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $dados['email'] ?>" placeholder="Seu melhor e-mail">
                            <div class="invalid-feedback">
                                <?= $dados['email_erro'] ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" id="senha" name="senha" value="<?= $dados['senha'] ?>" placeholder="Senha">
                            
                            
                            <div class="invalid-feedback">
                                <?= $dados['senha_erro'] ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="confirma_senha">Confirme a Senha</label>
                            <input type="password" class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>" id="confirma_senha" name="confirma_senha" value="<?= $dados['confirma_senha'] ?>" placeholder="Digite novamente a senha">
                            <div class="invalid-feedback">
                                <?= $dados['confirma_senha_erro'] ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Cadastrar">
                    </div>
                    <div class="col">
                        <a href="#">Você já tem conta? Faça o Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>