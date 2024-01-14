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
        if (Sessao::usuarioLogado()) {
            $dados = [
                'produtos' => $this->produtoModel->exibirProdutos($_SESSION['usuario_id'])
            ];
        }
    
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

    public function editarProduto($id)
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'id' => $id,
                'nomeProduto' => trim($formulario['nomeProduto']),
                'nomeProduto_erro' => '',
                'descricao' => $formulario['descricao'],  // Permite valor em branco
                'linkReceita' => $formulario['linkReceita'],  // Permite valor em branco
                'descricao_erro' => '',
                'linkReceita_erro' => '',
                
                
            ];

            
            if (empty($formulario['nomeProduto'])) {
                $dados['nomeProduto_erro'] = 'Informe o Nome do Produto';
            } else {
                if ($this->produtoModel->atualizar($dados)) {
                    Sessao::mensagemErro('produto', 'Produto editado com sucesso');
                    URL::redirecionar('produtos');
                } else {
                    die("Erro ao editar o produto");
                }
            }
            
        } else {

            $produto = $this-> produtoModel -> exibirProdutoPorId($id);

            if ($produto-> usuario_id != $_SESSION['usuario_id']) {
                Sessao::mensagemErro('produto', 'Você não tem autorização para editar esse produto', 'alert alert-danger');
                URL::redirecionar('produto');
            }

            $dados = [
                'id' => $produto -> id,
                'nomeProduto' => $produto -> nomeProduto,
                'descricao' => $produto -> descricao,
                'linkReceita' => $produto -> linkReceita,
                'nomeProduto_erro' => '',
                'descricao_erro' => '',
                'linkReceita_erro' => ''
            ];
        }

        var_dump($formulario);
        $this->view('produtos/editarProduto', $dados);
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

    public function deletar($id)
    {
        if (!$this->checarAutorizacao($id)) {
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if ($id && $metodo == 'POST') {
                if ($this->produtoModel->deletar($id)) {
                    Sessao::mensagemErro('produto', 'Produto deletado com sucesso!');
                    URL::redirecionar('produtos');
                }
            } else {
                Sessao::mensagemErro('produto', 'Você não tem autorização para deletar esse Produto', 'alert alert-danger');
                URL::redirecionar('produtos');
            }
        } else {
            Sessao::mensagemErro('produto', 'Você não tem autorização para deletar esse Produto', 'alert alert-danger');
            URL::redirecionar('produtos');
        }
    }

    private function checarAutorizacao($id)
    {
        $produto = $this-> produtoModel -> exibirProdutoPorId($id);

        if ($produto -> usuario_id != $_SESSION['usuario_id']) {
            return true;
        } else {
            return false;
        }
    }

    public function inserirMaterial()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'nomeMaterial' => trim($formulario['nomeMaterial']),
                'nomeMaterial_erro' => '',
                'precoMaterial' => trim($formulario['precoMaterial']),  
                'quantidadeMaterial' => trim($formulario['quantidadeMaterial']),  
                'precoMaterial_erro' => '',
                'quantidadeMaterial_erro' => '',
                'tipoMaterial' => trim($formulario['tipoMaterial']),
                'tipoMaterial_erro' => '',
                'usuario_id' => $_SESSION['usuario_id']
                
            ];

            if (in_array("", $formulario)) {
                if (empty($formulario['nomeMaterial'])) {
                    $dados['nomeMaterial_erro'] = 'Informe o Nome do Material';
                } 

                if (empty($formulario['precoMaterial'])) {
                    $dados['precoMaterial_erro'] = 'Informe o valor do material';
                } 

                if (empty($formulario['quantidadeMaterial'])) {
                    $dados['quantidadeMaterial_erro'] = 'Informe a quantidade de material Material';
                } 

                if (empty($formulario['tipoMaterial'])) {
                    $dados['tipoMaterial_erro'] = 'Informe o tipo de Material';
                } 
            } else {
                if ($this->produtoModel->inserirMaterial($dados)) {
                    Sessao::mensagemErro('material', 'Material cadastrado com sucesso');
                    URL::redirecionar('produtos/exibirProduto');
                } else {
                    die("Erro ao cadastrar material");
                }
            }

            
            
            
        } else {
            $dados = [
                'nomeMaterial' => '',
                'precoMaterial' => '',
                'quantidadeMaterial' => '',
                'tipoMaterial' => '',
                'nomeMaterial_erro' => '',
                'precoMaterial_erro' => '',
                'quantidadeMaterial_erro' => '',
                'tipoMaterial_erro' => '',
                'usuario_id' => '',
                'usuario_id_erro' => ''
            ];
        }
        $this->view('produtos/inserirMaterial', $dados);
    }
}

