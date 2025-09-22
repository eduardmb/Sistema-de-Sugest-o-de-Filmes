<?php
namespace DAO;

use Generic\MySqlFactory;

class CategoriaDAO implements DAOInterface {
    private MySqlFactory $factory;

    public function __construct() {
        $this->factory = new MySqlFactory();
    }

    public function listar() {
        $sql = "SELECT * FROM categorias";
        return $this->factory->banco->executar($sql)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        $sql = "INSERT INTO categorias (nome) VALUES (:nome)";
        return $this->factory->banco->executar($sql, [
            ':nome' => $dados['nome']
        ]);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE categorias SET nome = :nome WHERE id = :id";
        return $this->factory->banco->executar($sql, [
            ':id' => $id,
            ':nome' => $dados['nome']
        ]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM categorias WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        return $this->factory->banco->executar($sql, [':id' => $id])
            ->fetch(\PDO::FETCH_ASSOC);
    }
}
