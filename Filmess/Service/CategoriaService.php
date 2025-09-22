<?php
namespace Service;

use DAO\CategoriaDAO;

class CategoriaService {
    private CategoriaDAO $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function listar() {
        return $this->categoriaDAO->listar();
    }

    public function criar($nome) {
        if (empty($nome)) {
            throw new \InvalidArgumentException("O nome da categoria não pode ser vazio.");
        }
        return $this->categoriaDAO->inserir(['nome' => $nome]);
    }

    public function atualizar($id, $nome) {
        return $this->categoriaDAO->atualizar($id, ['nome' => $nome]);
    }

    public function deletar($id) {
        return $this->categoriaDAO->deletar($id);
    }

    public function buscarPorId($id) {
        return $this->categoriaDAO->buscarPorId($id);
    }
}
