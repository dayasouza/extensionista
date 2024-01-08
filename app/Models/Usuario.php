<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validarEmail($email)
    {
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function inserir($dados)
    {
        $this->db->query("INSERT INTO usuarios(nome, sobrenome, nascimento, artesanato, empresa, email, senha) VALUES (:nome, :sobrenome, :nascimento, :artesanato, :empresa, :email, :senha)");

        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("sobrenome", $dados['sobrenome']);
        $this->db->bind("nascimento", $dados['nascimento']);
        $this->db->bind("artesanato", $dados['artesanato']);
        $this->db->bind("empresa", $dados['empresa']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function validarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

}
