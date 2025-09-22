<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Filmes</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #1abc9c;
            color: #fff;
            text-transform: uppercase;
        }

        table tr {
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background-color: rgba(26, 188, 156, 0.2);
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

        .actions {
            display: flex;
            gap: 10px;
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
    <h1>Lista de Filmes</h1>

    <?php if (!empty($filmes)): ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmes as $filme): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($filme['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($filme['ano_lancamento']); ?></td>
                        <td class="actions">
                            <a class="btn" href="index.php?controller=Filme&action=editar&id=<?php echo $filme['id']; ?>">Editar</a>
                            <a class="btn" href="index.php?controller=Filme&action=deletar&id=<?php echo $filme['id']; ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="center">Nenhum filme cadastrado.</p>
    <?php endif; ?>

    <div class="button-group">
        <a class="btn" href="index.php?controller=Filme&action=criar">Adicionar Novo Filme</a>
        <a class="btn" href="index.php">Voltar para Home</a>
    </div>
</div>

</body>
</html>
