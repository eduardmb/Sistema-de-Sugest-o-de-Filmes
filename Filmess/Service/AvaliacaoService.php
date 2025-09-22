<?php
namespace Service;

use DAO\AvaliacaoDAO;

class AvaliacaoService {
    private AvaliacaoDAO $avaliacaoDAO;

    public function __construct() {
        $this->avaliacaoDAO = new AvaliacaoDAO();
    }

    public function listar() {
        return $this->avaliacaoDAO->listar();
    }

    public function criar($filmeId, $categoriaId, $nota) {
        if (empty($filmeId) || empty($categoriaId)) {
            throw new \InvalidArgumentException("Filme e Categoria são obrigatórios.");
        }
        if ($nota < 0 || $nota > 10) {
            throw new \InvalidArgumentException("A nota deve ser entre 0 e 10.");
        }

        return $this->avaliacaoDAO->inserir([
            'filme_id' => $filmeId,
            'categoria_id' => $categoriaId,
            'nota' => $nota
        ]);
    }

    public function atualizar($id, $filmeId, $categoriaId, $nota) {
        return $this->avaliacaoDAO->atualizar($id, [
            'filme_id' => $filmeId,
            'categoria_id' => $categoriaId,
            'nota' => $nota
        ]);
    }

    public function deletar($id) {
        return $this->avaliacaoDAO->deletar($id);
    }

    public function buscarPorId($id) {
        return $this->avaliacaoDAO->buscarPorId($id);
    }
}
