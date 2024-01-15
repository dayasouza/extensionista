<?php

class Perguntas extends Controller
{
    private $perguntaModel;

    public function __construct()
    {
        $this->perguntaModel = $this->model('Pergunta');
    }

    public function index()
    {
        $this->view('perguntas/index');
    }

    public function calcularPrecificacao()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $salarioDesejado = $_POST['salarioDesejado'];
            $horasDiarias = $_POST['horasDiarias'];
            $diasSemana = $_POST['diasSemana'];

            $valorHoraTrabalho = $this->perguntaModel->calcularValorHoraTrabalho($salarioDesejado, $horasDiarias, $diasSemana);

            $dados = [
                'valorHoraTrabalho' => $valorHoraTrabalho,
                'salarioDesejado' => $salarioDesejado,
                'horasDiarias' => $horasDiarias,
                'diasSemana' => $diasSemana,
            ];

            $this->view('perguntas/resultado', $dados);
        }
    }

    public function calcularValorVenda($valorHora, $horasGastas, $margemLucro, $taxaEcommerce)
    {
        
        // Calcula o custo do trabalho
        $custoTrabalho = $valorHora * $horasGastas;

        // Calcula a margem de lucro
        $lucro = $custoTrabalho * ($margemLucro / 100);

        // Calcula o valor sem a taxa de e-commerce
        $valorSemTaxa = $custoTrabalho + $lucro;

        // Calcula o valor com a taxa de e-commerce
        $valorComTaxa = $valorSemTaxa + ($valorSemTaxa * ($taxaEcommerce / 100));

        return $valorComTaxa;
    }
}
