<?php
// Generic
require_once __DIR__ . '/../Generic/MysqlSingleton.php';
require_once __DIR__ . '/../Generic/MySqlFactory.php';

// DAO Interface
require_once __DIR__ . '/../DAO/DAOInterface.php';

// DAOs
require_once __DIR__ . '/../DAO/FilmeDAO.php';
require_once __DIR__ . '/../DAO/CategoriaDAO.php';
require_once __DIR__ . '/../DAO/AvaliacaoDAO.php';

// Services
require_once __DIR__ . '/../Service/FilmeService.php';
require_once __DIR__ . '/../Service/CategoriaService.php';
require_once __DIR__ . '/../Service/AvaliacaoService.php';

// Controllers
require_once __DIR__ . '/../Controller/FilmeController.php';
require_once __DIR__ . '/../Controller/CategoriaController.php';
require_once __DIR__ . '/../Controller/AvaliacaoController.php';

// Router
$controller = $_GET['controller'] ?? 'Home';
$action = $_GET['action'] ?? 'index';

// Se não tiver controller/action, carrega a página inicial
if ($controller === 'Home') {
    require __DIR__ . '/../View/home.php';
    exit;
}

$controllerClass = "Controller\\{$controller}Controller";
if (class_exists($controllerClass)) {
    $c = new $controllerClass();
    if (method_exists($c, $action)) {
        $c->$action();
    } else {
        echo "Método $action não existe.";
    }
} else {
    echo "Controller $controllerClass não encontrado.";
}
