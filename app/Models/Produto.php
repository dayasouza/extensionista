<?php

class Produto
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function exibirProdutos($usuarioId)
    {
        $this->db->query("SELECT *,
        produtos.id AS produtoId,
        produtos.criado_em AS dataCadatroProduto,
        usuarios.id AS usuariosId,
        usuarios.criado_em AS dataCadastroUsuario
        FROM produtos
        INNER JOIN usuarios ON produtos.usuario_id = usuarios.id
        WHERE produtos.usuario_id = :usuarioId
        ORDER BY dataCadatroProduto DESC");

    $this->db->bind("usuarioId", $usuarioId);

    return $this->db->resultados();
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

    public function atualizar($dados)
    {
        $this->db->query("UPDATE produtos SET nomeProduto = :nomeProduto, descricao = :descricao, linkReceita = :linkReceita WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("nomeProduto", $dados['nomeProduto']);
        $this->db->bind("descricao", $dados['descricao']);
        $this->db->bind("linkReceita", $dados['linkReceita']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function exibirProdutoPorId($id)
    {
        $this->db->query("SELECT * FROM produtos WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }
}
