

<div class="container mt-5">
    <h2>Resultado da Precificação</h2>
    <p>Valor da hora de trabalho: R$<?= number_format($dados['valorHoraTrabalho'], 2, ',', '.') ?></p>
    <p>Salário desejado: R$<?= $dados['salarioDesejado'] ?></p>
    <p>Horas diárias: <?= $dados['horasDiarias'] ?></p>
    <p>Dias na semana: <?= $dados['diasSemana'] ?></p>
</div>


