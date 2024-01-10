<?php

class Produto
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function inserir($dados)
    {
        $this->db->query("INSERT INTO produtos (usuario_id, nomeProduto, descricao, linkReceita) VALUES (:usuario_id, :nomeProduto, :descricao, :linkReceita)");

        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("nomeProduto", $dados['nomeProduto']);
        $this->db->bind("descricao", $dados['descricao']);
        $this->db->bind("linkReceita", $dados['linkReceita']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}