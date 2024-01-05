<?php
class Usuarios extends Controller
{
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
                if (!preg_match('/^[A-Za-zÀ-ú\s]+$/', $formulario['nome'])) {
                    $dados['nome_erro'] = 'O campo nome não deve conter números';
                } elseif (!preg_match('/^[A-Za-zÀ-ú\s]+$/', $formulario['sobrenome'])) {
                    $dados['sobrenome_erro'] = 'O campo Sobrenome não deve conter números';
                } elseif ($dataNascimento = DateTime::createFromFormat('Y-m-d', $formulario['nascimento'])) {
                    if (!$dataNascimento || $dataNascimento->format('Y-m-d') !== $formulario['nascimento']) {
                        $dados['nascimento_erro'] = 'Informe uma data de nascimento válida no formato YYYY-MM-DD';
                    }
                } elseif (strlen($formulario['senha'] < 6)) {
                    $dados['senha_erro'] = 'A senha deve ter no minímo 6 caracteres';
                } elseif ($formulario['senha'] != $formulario['confirma_senha']) {
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                } elseif (!filter_var($formulario['email'], FILTER_VALIDATE_EMAIL)) {
                    $dados['email_erro'] = 'digite um endereço de e-mail válido';
                } else {
                    echo 'Pode cadastrar os dados <hr>';
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
}
