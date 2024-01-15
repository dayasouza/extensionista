<div class="container mt-5">
    <h4>PERGUNTAS</h4>
    <form action="<?= URL ?>/perguntas/calcularPrecificacao" method="POST">
        <div class="form-group">
            <label for="salarioDesejado">Qual o salário desejado?</label>
            <input type="number" class="form-control" name="salarioDesejado" required>
        </div>
        <div class="form-group">
            <label for="horasDiarias">Quantas horas irá trabalhar diariamente?</label>
            <input type="number" class="form-control" name="horasDiarias" required>
        </div>
        <div class="form-group">
            <label for="diasSemana">Quantos dias na semana você irá trabalhar?</label>
            <input type="number" class="form-control" name="diasSemana" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
</div>



