<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($categoria) ? 'Editar Categoria' : 'Cadastrar Categoria'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffffff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #34495e;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.3);
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type=text] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            color: #222;
            background: #f7f7f7;
            box-sizing: border-box;
        }

        .center {
            text-align: center;
            margin-top: 12px;
        }

        .btn {
            display: inline-block;
            margin: 5px;
            padding: 10px 15px;
            background: #1abc9c;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.15s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #16a085;
            transform: translateY(-2px);
        }

        p.erro {
            color: #ff4d4d;
            font-weight: bold;
            margin-top: 10px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?php echo isset($categoria) ? 'Editar Categoria' : 'Cadastrar Categoria'; ?></h1>

    <?php if (isset($erro)) : ?>
        <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $categoria['nome'] ?? ''; ?>">

        <div class="center">
            <button type="submit" class="btn"><?php echo isset($categoria) ? 'Atualizar' : 'Cadastrar'; ?></button>
        </div>
    </form>

    <div class="button-group">
        <a class="btn" href="index.php?controller=Categoria&action=listar">📋 Ver Lista de Categorias</a>
        <a class="btn" href="index.php">🏠 Voltar ao Menu</a>
    </div>
</div>
</body>
</html>
