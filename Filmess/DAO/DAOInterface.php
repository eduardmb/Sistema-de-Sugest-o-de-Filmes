<?php
namespace DAO;

interface DAOInterface {
    public function inserir($dados);
    public function atualizar($id, $dados);
    public function deletar($id);
    public function listar();
    public function buscarPorId($id);
}
