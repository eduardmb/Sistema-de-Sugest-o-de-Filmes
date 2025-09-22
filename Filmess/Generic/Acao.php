<?php
namespace Generic;

class Acao {
    private $classe;
    private $metodo;

    public function __construct($classe, $metodo) {
        // Corrige o nome do controller: ex -> "Categoria" => "Controller\CategoriaController"
        $this->classe = "Controller\\" . ucfirst($classe) . "Controller";
        $this->metodo = $metodo;
    }

    public function executar() {
        if (class_exists($this->classe)) {
            $obj = new $this->classe();
            if (method_exists($obj, $this->metodo)) {
                $obj->{$this->metodo}();
            } else {
                echo "Método {$this->metodo} não encontrado.";
            }
        } else {
            echo "Controller {$this->classe} não encontrado.";
        }
    }
}
