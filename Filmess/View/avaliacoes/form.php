<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($avaliacao) ? 'Editar Avaliação' : 'Cadastrar Avaliação'; ?></title>
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
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #34495e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.3);
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            font-weight: bold;
            color: #ecf0f1;
        }

        select, input[type=number] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #2c3e50;
            background: #f7f7f7;
            color: #222;
            box-sizing: border-box;
            font-size: 14px;
        }

        .center {
            text-align: center;
            margin-top: 12px;
        }

        .btn {
            display: inline-block;
            margin-top: 12px;
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

        .submit-btn {
            background: #1abc9c;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #16a085;
        }

        p.erro {
            color: #ffcccc;
            background: #c0392b;
            padding: 8px 10px;
            border-radius: 6px;
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
    <h1><?php echo isset($avaliacao) ? 'Editar Avaliação' : 'Cadastrar Avaliação'; ?></h1>

    <?php if (isset($erro)) : ?>
        <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="filme_id">Filme:</label>
        <select id="filme_id" name="filme_id" required>
            <option value="">Selecione</option>
            <?php foreach ($filmes as $filme): ?>
                <option value="<?php echo $filme['id']; ?>"
                    <?php echo (isset($avaliacao['filme_id']) && $avaliacao['filme_id'] == $filme['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($filme['titulo']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="categoria_id">Categoria:</label>
        <select id="categoria_id" name="categoria_id" required>
            <option value="">Selecione</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"
                    <?php echo (isset($avaliacao['categoria_id']) && $avaliacao['categoria_id'] == $categoria['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($categoria['nome']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="nota">Nota (0 a 10):</label>
        <input type="number" id="nota" name="nota" min="0" max="10" step="1" value="<?php echo $avaliacao['nota'] ?? ''; ?>" required>

        <div class="center">
            <button type="submit" class="submit-btn"><?php echo isset($avaliacao) ? 'Atualizar' : 'Cadastrar'; ?></button>
        </div>
    </form>

    <div class="button-group">
        <a class="btn" href="index.php?controller=Avaliacao&action=listar">👀 Ver Lista de Avaliações</a>
        <a class="btn" href="index.php">🏠 Voltar ao Menu</a>
    </div>
</div>
</body>
</html>
