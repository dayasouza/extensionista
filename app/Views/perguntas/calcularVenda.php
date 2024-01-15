<div class="container col-md mx-auto p-5">
    <h4 class="card-header bg-azulEscuro text-white">Calcular Valor de Venda</h4>
    <div class="card-body bg-light p-3">
        <?php if (!empty($dados['valorVenda'])) : ?>
            <p class="card-text">O valor de venda recomendado é: R$ <?= number_format($dados['valorVenda'], 2, ',', '.') ?></p>
        <?php else : ?>
            <p class="card-text">Preencha os dados necessários para calcular o valor de venda.</p>
        <?php endif; ?>

        <form action="<?= URL ?>/aplicativo/calcularValorVenda" method="post">
            <div class="form-group">
                <label for="valorHora">Valor da Hora de Trabalho:</label>
                <input type="text" name="valorHora" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="horasGastas">Horas Gastas para Produzir:</label>
                <input type="text" name="horasGastas" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="margemLucro">Margem de Lucro (%):</label>
                <input type="text" name="margemLucro" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="taxaEcommerce">Taxa de E-commerce (%):</label>
                <input type="text" name="taxaEcommerce" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
    </div>
</div>
