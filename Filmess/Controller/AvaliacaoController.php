<?php
namespace Controller;

use Service\AvaliacaoService;
use Service\FilmeService;
use Service\CategoriaService;

class AvaliacaoController {
    private AvaliacaoService $avaliacaoService;
    private FilmeService $filmeService;
    private CategoriaService $categoriaService;

    public function __construct() {
        $this->avaliacaoService = new AvaliacaoService();
        $this->filmeService = new FilmeService();
        $this->categoriaService = new CategoriaService();
    }

    public function listar() {
        $avaliacoes = $this->avaliacaoService->listar();
        require __DIR__ . '/../View/avaliacoes/listar.php';
    }

    public function criar() {
        $filmes = $this->filmeService->listar();
        $categorias = $this->categoriaService->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filmeId = $_POST['filme_id'] ?? null;
            $categoriaId = $_POST['categoria_id'] ?? null;
            $nota = $_POST['nota'] ?? null;

            try {
                $this->avaliacaoService->criar($filmeId, $categoriaId, $nota);
                header("Location: index.php?controller=Avaliacao&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                require __DIR__ . '/../View/avaliacoes/form.php';
            }
        } else {
            $erro = null;
            require __DIR__ . '/../View/avaliacoes/form.php';
        }
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?controller=Avaliacao&action=listar");
            exit;
        }

        $filmes = $this->filmeService->listar();
        $categorias = $this->categoriaService->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filmeId = $_POST['filme_id'] ?? null;
            $categoriaId = $_POST['categoria_id'] ?? null;
            $nota = $_POST['nota'] ?? null;

            try {
                $this->avaliacaoService->atualizar($id, $filmeId, $categoriaId, $nota);
                header("Location: index.php?controller=Avaliacao&action=listar");
                exit;
            } catch (\Exception $e) {
                $erro = $e->getMessage();
                $avaliacao = ['id' => $id, 'filme_id' => $filmeId, 'categoria_id' => $categoriaId, 'nota' => $nota];
                require __DIR__ . '/../View/avaliacoes/form.php';
            }
        } else {
            $avaliacao = $this->avaliacaoService->buscarPorId($id);
            $erro = null;
            require __DIR__ . '/../View/avaliacoes/form.php';
        }
    }

    public function deletar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->avaliacaoService->deletar($id);
        }
        header("Location: index.php?controller=Avaliacao&action=listar");
        exit;
    }
}
