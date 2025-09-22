<?php
namespace Controller;

use Service\FilmeService;

class FilmeController {
    private FilmeService $filmeService;

    public function __construct() {
        $this->filmeService = new FilmeService();
    }

    // Lista todos os filmes
    public function listar() {
        $filmes = $this->filmeService->listar();
        require __DIR__ . '/../View/filmes/listar.php';
    }

    // Cria um novo filme
    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? null;
            $ano = $_POST['ano'] ?? null;

            try {
                $this->filmeService->criar($titulo, $ano);
                header("Location: index.php?controller=Filme&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                require __DIR__ . '/../View/filmes/form.php';
            }
        } else {
            $erro = null;
            require __DIR__ . '/../View/filmes/form.php';
        }
    }

    // Edita um filme existente
    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?controller=Filme&action=listar");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? null;
            $ano = $_POST['ano'] ?? null;

            try {
                $this->filmeService->atualizar($id, $titulo, $ano);
                header("Location: index.php?controller=Filme&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                $filme = ['id' => $id, 'titulo' => $titulo, 'ano_lancamento' => $ano];
                require __DIR__ . '/../View/filmes/form.php';
            }
        } else {
            $filme = $this->filmeService->listar();
            $filme = array_filter($filme, fn($f) => $f['id'] == $id);
            $filme = reset($filme); // pega o primeiro elemento
            $erro = null;
            require __DIR__ . '/../View/filmes/form.php';
        }
    }

    // Deleta um filme
    public function deletar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->filmeService->deletar($id);
        }
        header("Location: index.php?controller=Filme&action=listar");
        exit;
    }
}
