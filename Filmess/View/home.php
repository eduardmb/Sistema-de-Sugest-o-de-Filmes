<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Sugestão de Filmes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 2.5em;
            color: #1abc9c;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;
        }

        .btn {
            background: #1abc9c;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
            font-weight: bold;
        }

        .btn:hover {
            background: #16a085;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <h1>🎬 Sistema de Sugestão de Filmes</h1>

    <div class="menu">
        <a href="http://localhost/filmess/Filmess/Public/index.php?controller=Filme&action=criar">
            <button class="btn">🎥 Gerenciar Filmes</button>
        </a>
        <a href="http://localhost/filmess/Filmess/Public/index.php?controller=Categoria&action=criar">
            <button class="btn">🏷️ Gerenciar Categorias</button>
        </a>
        <a href="http://localhost/filmess/Filmess/Public/index.php?controller=Avaliacao&action=criar">
            <button class="btn">⭐ Gerenciar Avaliações</button>
        </a>
    </div>
</body>
</html>
