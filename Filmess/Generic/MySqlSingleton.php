<?php
namespace Generic;

class MysqlSingleton {
    private $usuario = "root";
    private $senha = "";
    private $conexao = null;
    private static $instance = null;

    // construtor privado para impedir criação externa
    private function __construct() {
        if ($this->conexao === null) {
            $this->conexao = new \PDO(
                "mysql:host=localhost;port=3307;dbname=filmes_bd",
                $this->usuario,
                $this->senha
            );
            $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    // método público estático para pegar a instância única
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new MysqlSingleton();
        }
        return self::$instance;
    }

    // método para executar queries
    public function executar($query, $params = []) {
        $stmt = $this->conexao->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}

