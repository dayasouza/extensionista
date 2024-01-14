<?php 
// Material.php

class Material
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function inserirMaterial($dados)
    {
        $this->db->query('INSERT INTO materiais (usuario_id, id_produto, nomeMaterial, precoMaterial, quantidadeMaterial, tipoMaterial) VALUES (:usuario_id, :id_produto, :nomeMaterial, :precoMaterial, :quantidadeMaterial, :tipoMaterial)');

        $this->db->bind(':usuario_id', $dados['usuario_id']);
        $this->db->bind(':id_produto', $dados['id_produto']);
        $this->db->bind(':nomeMaterial', $dados['nomeMaterial']);
        $this->db->bind(':precoMaterial', $dados['precoMaterial']);
        $this->db->bind(':quantidadeMaterial', $dados['quantidadeMaterial']);
        $this->db->bind(':tipoMaterial', $dados['tipoMaterial']);

        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }


    public function exibirMateriais($produtoId)
    {
        $this->db->query('SELECT * FROM materiais WHERE id_produto = :id_produto');
        $this->db->bind(':id_produto', $produtoId);

        return $this->db->resultados();
    }

    public function listarMateriais()
    {
        $this->db->query("SELECT * FROM materiais");
        return $this->db->resultados();
    }
}
