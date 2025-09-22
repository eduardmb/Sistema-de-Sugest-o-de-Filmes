<?php
namespace Controller;

use Service\CategoriaService;

class CategoriaController {
    private CategoriaService $categoriaService;

    public function __construct() {
        $this->categoriaService = new CategoriaService();
    }

    public function listar() {
        $categorias = $this->categoriaService->listar();
        require __DIR__ . '/../View/categorias/listar.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;

            try {
                $this->categoriaService->criar($nome);
                header("Location: index.php?controller=Categoria&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                require __DIR__ . '/../View/categorias/form.php';
            }
        } else {
            $erro = null;
            require __DIR__ . '/../View/categorias/form.php';
        }
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?controller=Categoria&action=listar");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;
            try {
                $this->categoriaService->atualizar($id, $nome);
                header("Location: index.php?controller=Categoria&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                $categoria = ['id' => $id, 'nome' => $nome];
                require __DIR__ . '/../View/categorias/form.php';
            }
        } else {
            $categoria = $this->categoriaService->buscarPorId($id);
            $erro = null;
            require __DIR__ . '/../View/categorias/form.php';
        }
    }

    public function deletar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->categoriaService->deletar($id);
        }
        header("Location: index.php?controller=Categoria&action=listar");
        exit;
    }
}
