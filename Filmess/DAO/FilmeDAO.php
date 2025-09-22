<?php
namespace DAO;

use Generic\MySqlFactory;

class FilmeDAO implements DAOInterface {
    private MySqlFactory $factory;

    public function __construct() {
        $this->factory = new MySqlFactory();
    }

    // Lista todos os filmes
    public function listar() {
        $sql = "SELECT * FROM filmes";
        return $this->factory->banco->executar($sql)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Insere um filme, recebe um array $dados ['titulo'=>..., 'ano_lancamento'=>...]
    public function inserir($dados) {
        $sql = "INSERT INTO filmes (titulo, ano_lancamento) VALUES (:titulo, :ano_lancamento)";
        return $this->factory->banco->executar($sql, [
            ':titulo' => $dados['titulo'],
            ':ano_lancamento' => $dados['ano_lancamento']
        ]);
    }

    // Atualiza um filme, recebe o id e um array $dados
    public function atualizar($id, $dados) {
        $sql = "UPDATE filmes SET titulo = :titulo, ano_lancamento = :ano_lancamento WHERE id = :id";
        return $this->factory->banco->executar($sql, [
            ':id' => $id,
            ':titulo' => $dados['titulo'],
            ':ano_lancamento' => $dados['ano_lancamento']
        ]);
    }

    // Deleta um filme pelo id
    public function deletar($id) {
        $sql = "DELETE FROM filmes WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id]);
    }

    // Busca um filme pelo id
    public function buscarPorId($id) {
        $sql = "SELECT * FROM filmes WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id])
            ->fetch(\PDO::FETCH_ASSOC);
    }
}
