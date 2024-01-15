<?php

class Pergunta
{
    public function calcularValorHoraTrabalho($salarioDesejado, $horasDiarias, $diasSemana)
    {
        $totalHorasPorSemana = $horasDiarias * $diasSemana;
        $totalHorasPorMes = $totalHorasPorSemana * 4; // Supondo um mês de 4 semanas

        return $salarioDesejado / $totalHorasPorMes;
    }
}