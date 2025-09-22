<?php
namespace DAO;

use Generic\MySqlFactory;

class AvaliacaoDAO implements DAOInterface {
    private MySqlFactory $factory;

    public function __construct() {
        $this->factory = new MySqlFactory();
    }

    public function listar() {
        $sql = "SELECT a.id, f.titulo, c.nome AS categoria, a.nota
                FROM avaliacoes a
                JOIN filmes f ON f.id = a.filme_id
                JOIN categorias c ON c.id = a.categoria_id";
        return $this->factory->banco->executar($sql)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        $sql = "INSERT INTO avaliacoes (filme_id, categoria_id, nota) 
                VALUES (:filme_id, :categoria_id, :nota)";
        return $this->factory->banco->executar($sql, [
            ':filme_id' => $dados['filme_id'],
            ':categoria_id' => $dados['categoria_id'],
            ':nota' => $dados['nota']
        ]);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE avaliacoes 
                SET filme_id = :filme_id, categoria_id = :categoria_id, nota = :nota 
                WHERE id = :id";
        return $this->factory->banco->executar($sql, [
            ':id' => $id,
            ':filme_id' => $dados['filme_id'],
            ':categoria_id' => $dados['categoria_id'],
            ':nota' => $dados['nota']
        ]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM avaliacoes WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM avaliacoes WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id])
            ->fetch(\PDO::FETCH_ASSOC);
    }
}
