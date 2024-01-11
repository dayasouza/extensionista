<?php
class Produtos extends Controller
{
    private $produtoModel;
    private $usuarioModel;

    public function __construct()
    {
        if (!Sessao::usuarioLogado()) {
            URL::redirecionar('usuarios/login');
        }
        $this->produtoModel = $this->model('Produto');
        $this->usuarioModel = $this->model('Usuario');
    }
    public function index()
    {
        $dados = [
            'produtos' => $this-> produtoModel -> exibirProdutos()
        ];

        $this->view('produtos/index', $dados);
    }

    public function cadastrarProduto()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'nomeProduto' => trim($formulario['nomeProduto']),
                'nomeProduto_erro' => '',
                'descricao' => $formulario['descricao'],  // Permite valor em branco
                'linkReceita' => $formulario['linkReceita'],  // Permite valor em branco
                'descricao_erro' => '',
                'linkReceita_erro' => '',
                'usuario_id' => $_SESSION['usuario_id']
                
            ];

            
            if (empty($formulario['nomeProduto'])) {
                $dados['nomeProduto_erro'] = 'Informe o Nome do Produto';
            } else {
                if ($this->produtoModel->inserir($dados)) {
                    Sessao::mensagemErro('produto', 'Produto cadastrado com sucesso');
                    URL::redirecionar('produtos');
                } else {
                    die("Erro ao cadastrar novo produto");
                }
            }
            
        } else {
            $dados = [
                'nomeProduto' => '',
                'descricao' => '',
                'linkReceita' => '',
                'nomeProduto_erro' => '',
                'descricao_erro' => '',
                'linkReceita_erro' => '',
                'usuario_id' => '',
                'usuario_id_erro' => ''
            ];
        }
        $this->view('produtos/cadastrarProduto', $dados);
    }

    public function exibirProduto($id)
    {
        $produto = $this-> produtoModel -> exibirProdutoPorId($id);
        $usuario = $this-> usuarioModel -> exibirUsuarioPorId($produto -> usuario_id);
        $dados = [
            'produto' => $produto,
            'usuario' => $usuario
        ];

        $this-> view('produtos/exibirProduto', $dados);
    }
}

