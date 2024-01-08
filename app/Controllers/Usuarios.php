<?php
class Usuarios extends Controller
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }
    public function cadastrar()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
            $dados = [
                'nome' => trim($formulario['nome']),
                'sobrenome' => trim($formulario['sobrenome']),
                'nascimento' => trim($formulario['nascimento']),
                'artesanato' => trim($formulario['artesanato']),
                'empresa' => trim($formulario['empresa']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'nome_erro' => '',
                'sobrenome_erro' => '',
                'nascimento_erro' => '',
                'artesanato_erro' => '',
                'empresa_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => ''
            ];

            if (in_array("", $formulario)) {
                if (empty($formulario['nome'])) {
                    $dados['nome_erro'] = 'Informe o seu nome';
                }
                if (empty($formulario['sobrenome'])) {
                    $dados['sobrenome_erro'] = 'Informe o seu Sobrenome';
                }
                if (empty($formulario['nascimento'])) {
                    $dados['nascimento_erro'] = 'Informe sua Data de Nascimento';
                }
                if (empty($formulario['artesanato'])) {
                    $dados['artesanato_erro'] = 'Campo obrigatório';
                }
                if (empty($formulario['empresa'])) {
                    $dados['empresa_erro'] = 'Campo Obrigatório';
                }
                if (empty($formulario['email'])) {
                    $dados['email_erro'] = 'Informe o seu E-mail';
                }
                if (empty($formulario['senha'])) {
                    $dados['senha_erro'] = 'Cadastre uma Senha';
                }
                if (empty($formulario['confirma_senha'])) {
                    $dados['confirma_senha_erro'] = 'Confirme a Senha';
                }
            } else {
                if (Valida::validarNome($formulario['nome'])) {
                    $dados['nome_erro'] = 'O campo nome não deve conter números';
                } elseif (Valida::validarSobreNome(
                    $formulario['sobrenome']
                )) {
                    $dados['sobrenome_erro'] = 'O campo Sobrenome não deve conter números';
                } elseif (strlen($formulario['senha'] < 6)) {
                    $dados['senha_erro'] = 'A senha deve ter no minímo 6 caracteres';
                } elseif ($formulario['senha'] != $formulario['confirma_senha']) {
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                } elseif (Valida::validarEmail($formulario['email'])) {
                    $dados['email_erro'] = 'digite um endereço de e-mail válido';
                } elseif ($this->usuarioModel->validarEmail($formulario['email'])
                ) {
                    $dados['email_erro'] = 'O e-mail informado já está cadastrado';
                } else {
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->inserir($dados)) {
                        Sessao::mensagemErro('usuario', 'Cadsatro realizado com sucesso');
                        Url::redirecionar('usuarios/login');
                    } else {
                        die("Erro ao armazenar usuario no banco de dados");
                    }
                }
            }

            var_dump($formulario);
        } else {
            $dados = [
                'nome' => '',
                'sobrenome' => '',
                'nascimento' => '',
                'artesanato' => '',
                'empresa' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'sobrenome_erro' => '',
                'nascimento_erro' => '',
                'artesanato_erro' => '',
                'empresa_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => ''
            ];
        }
        $this->view('usuarios/cadastrar', $dados);
    }


    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'email_erro' => '',
                'senha_erro' => ''
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

            else :
                if (Valida::validarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                else :

                    $usuario = $this->usuarioModel->validarLogin($formulario['email'], $formulario['senha']);

                    if ($usuario) :

                        $this->criarSessaoUsuario($usuario);
                    else :
                        Sessao::mensagemErro('usuario', 'Usuário ou senha inválidos', 'alert alert-danger');
                    endif;

                endif;

            endif;

            var_dump($formulario);
        else :
            $dados = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ];

        endif;


        $this->view('usuarios/login', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_sobrenome'] = $usuario->sobrenome;
        $_SESSION['usuario_email'] = $usuario->email;

        URL::redirecionar('posts');
    }

    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_sobrenome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        header('Location: ' . URL . '');

        Url::redirecionar('usuarios/login');
    }
}
