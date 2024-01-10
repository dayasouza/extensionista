<?php

class Produto
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function exibirProdutos()
    {
        $this-> db -> query("SELECT *,
        produtos.id AS produtoId,
        produtos.criado_em AS dataCadatroProduto,
        usuarios.id AS usuariosId,
        usuarios.criado_em AS dataCadastroUsuario
        FROM produtos
        INNER JOIN usuarios ON
        produtos.usuario_id = usuarios.id 
        ORDER BY dataCadatroProduto DESC");
        return $this-> db -> resultados();
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