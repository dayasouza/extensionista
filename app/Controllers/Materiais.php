<?php 

class Materiais extends Controller
{
    private $materialModel;
    private $produtoModel;

    public function __construct()
    {
        if (!Sessao::usuarioLogado()) {
            URL::redirecionar('usuarios/login');
        }
        $this->materialModel = $this->model('Material');
    }

    public function index()
    {
        
        
        $dados = [
            'materiais' => $this->materialModel->listarMateriais()
        ];

        $this->view('materiais/index', $dados);
        
        
    }

    public function inserirMaterial($produtoId)
    {

        $produtoModel = $this->model('Produto');
        $materialModel = $this->model('Material');
        $produto = $produtoModel->exibirProdutoPorId($produtoId);

        if (!$produto) {
            // Trate o caso em que o produto não é encontrado
            die('Produto não encontrado');
        }
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = [
                'produto' => $produto,
                'usuario_id' => $_SESSION['usuario_id'],
                'id_produto' => $produtoId,
                'nomeMaterial' => trim($formulario['nomeMaterial']),
                'precoMaterial' => trim($formulario['precoMaterial']),
                'quantidadeMaterial' => trim($formulario['quantidadeMaterial']),
                'tipoMaterial' => trim($formulario['tipoMaterial']),
                'nomeMaterial_erro' => '',
                'precoMaterial_erro' => '',
                'quantidadeMaterial_erro' => '',
                'tipoMaterial_erro' => ''
            ];

            // Validar os dados antes de inserir no banco de dados
            if (empty($dados['nomeMaterial'])) {
                $dados['nomeMaterial_erro'] = 'Informe o nome do material';
            }

            if (empty($dados['precoMaterial'])) {
                $dados['precoMaterial_erro'] = 'Informe o preço do material';
            }

            if (empty($dados['quantidadeMaterial'])) {
                $dados['quantidadeMaterial_erro'] = 'Informe a quantidade do material';
            }

            if (empty($dados['tipoMaterial'])) {
                $dados['tipoMaterial_erro'] = 'Informe o tipo do material';
            }

            
            
                // Chame o método do modelo para inserir o material no banco de dados
                if ($this->materialModel->inserirMaterial($dados)) {
                    Sessao::mensagemErro('material', 'Material inserido com sucesso');
                    URL::redirecionar('materiais');
                } else {
                    die('Erro ao inserir material');
                }
            
                // Se houver erros, recarregue a view com os erros
                $this->view('materiais/inserirMaterial', $dados);
          

            var_dump($formulario);
        } else {
            // Carregue a view do formulário
            $dados = [
                'produto' => $produto,
                'usuario_id' => '',
                'id_produto' => '',
                'nomeMaterial' => '',
                'precoMaterial' => '',
                'quantidadeMaterial' => '',
                'tipoMaterial' => '',
                'nomeMaterial_erro' => '',
                'precoMaterial_erro' => '',
                'quantidadeMaterial_erro' => '',
                'tipoMaterial_erro' => ''
            ];

            $this->view('materiais/inserirMaterial', $dados);
        }
    }

    private function checarAutorizacao($produtoId)
    {
        $produto = $this-> produtoModel -> exibirProdutoPorId($produtoId);

        if ($produto -> usuario_id != $_SESSION['usuario_id']) {
            return true;
        } else {
            return false;
        }
    }


    public function exibirMaterial($materialId)
    {
        $material = $this->materialModel->exibirMaterialPorId($materialId);

        if (!$material) {
            // Adicione lógica para lidar com o material não encontrado
            Sessao::mensagemErro('material', 'Material não encontrado', 'alert alert-danger');
            URL::redirecionar('materiais'); // Redirecione para a página de materiais por exemplo
            return;
        }

        // Verifique se o usuário tem autorização para acessar esse material (se necessário)
        // Adicione lógica adicional conforme necessário

        $dados = [
            'material' => $material,
        ];

        $this->view('materiais/exibirMaterial', $dados);
    }
 
}
