<?php
class Produtos extends Controller
{
    private $usuarioModel;

    public function __construct()
    {
        if (!Sessao::usuarioLogado()) {
            URL::redirecionar('usuarios/login');
        }
    }
    public function index()
    {
        $this->view('produtos/index');
    }

    public function cadastrar()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'nomeProduto' => trim($formulario['nomeProduto']),
                'nomeProduto_erro' => '',
                'descricao' => $formulario['descricao'],  // Permite valor em branco
                'linkReceita' => $formulario['linkReceita'],  // Permite valor em branco
                'descricao_erro' => '',
                'linkReceita_erro' => ''
            ];

            
            if (empty($formulario['nomeProduto'])) {
                $dados['nomeProduto_erro'] = 'Informe o Nome do Produto';
            } else {
                echo "Pode cadastrar o produto <hr>";
                var_dump($formulario);
            }
            
        } else {
            $dados = [
                'nomeProduto' => '',
                'descricao' => '',
                'linkReceita' => '',
                'nomeProduto_erro' => '',
                'descricao_erro' => '',
                'linkReceita_erro' => ''
            ];
        }
        $this->view('produtos/cadastrar', $dados);
    }
}
