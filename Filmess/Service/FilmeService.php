<?php
namespace Service;

use DAO\FilmeDAO;

class FilmeService {
    private FilmeDAO $filmeDAO;

    public function __construct() {
        $this->filmeDAO = new FilmeDAO();
    }

    public function listar() {
        return $this->filmeDAO->listar();
    }

    public function criar($titulo, $ano) {
        $ano = (int)$ano; // garante que seja inteiro
        $anoAtual = (int)date("Y");
        
        if (empty($titulo)) {
            throw new \InvalidArgumentException("O título do filme não pode ser vazio.");
        }
        if ($ano < 1800 || $ano > $anoAtual + 5) { // permite até 5 anos no futuro
            throw new \InvalidArgumentException("O ano informado é inválido.");
        }
        return $this->filmeDAO->inserir([
            'titulo' => $titulo,
            'ano_lancamento' => $ano
        ]);
    }

    public function atualizar($id, $titulo, $ano) {
        $ano = (int)$ano; // garante que seja inteiro
        return $this->filmeDAO->atualizar($id, [
            'titulo' => $titulo,
            'ano_lancamento' => $ano
        ]);
    }

    public function deletar($id) {
        return $this->filmeDAO->deletar($id);
    }
}
