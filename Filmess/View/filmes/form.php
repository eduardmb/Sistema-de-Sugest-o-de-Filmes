<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($filme) ? 'Editar Filme' : 'Cadastrar Filme'; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #ffffffff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        input[type=text], input[type=number] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        .btn {
            background: #1abc9c;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn:hover {
            background-color: #16a085;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        p.erro {
            color: #ff4d4d;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .center {
            text-align: center;
        }

        .button-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo isset($filme) ? 'Editar Filme' : 'Cadastrar Filme'; ?></h1>

    <?php if (isset($erro)) : ?>
        <p class="erro"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $filme['titulo'] ?? ''; ?>">

        <label for="ano">Ano de Lançamento:</label>
        <input type="number" id="ano" name="ano" value="<?php echo $filme['ano_lancamento'] ?? ''; ?>">

        <div class="center">
            <button type="submit" class="btn"><?php echo isset($filme) ? 'Atualizar' : 'Cadastrar'; ?></button>
        </div>
    </form>

    <div class="button-group">
        <a class="btn" href="index.php?controller=Filme&action=listar">Ver lista de Filmes</a>
        <a class="btn" href="index.php">Voltar para Home</a>
    </div>
</div>

</body>
</html>
