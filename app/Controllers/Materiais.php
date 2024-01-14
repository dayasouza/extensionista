<?php

class Materiais extends Controller
{
    private $produtoModel;
    private $usuarioModel;
    private $materialModel;

    public function __construct()
    {
        if (!Sessao::usuarioLogado()) {
            URL::redirecionar('usuarios/login');
        }
        $this->produtoModel = $this->model('Produto');
        $this->usuarioModel = $this->model('Usuario');
        $this->materialModel = $this->model('Material');
    }

    public function index()
    {
        //if (Sessao::usuarioLogado()) {
            //$dados = [
                //'materiais' => $this->materialModel->exibirMateriais($_SESSION['usuario_id'])
           // ];
       // }
    
        $this->view('materiais/index');
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
        $this->view('materiais/inserirMaterial', $dados);
    }
}