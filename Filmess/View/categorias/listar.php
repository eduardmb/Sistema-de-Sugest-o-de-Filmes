<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorias</title>
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
            max-width: 900px;
            margin: 0 auto;
            background: #34495e;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #2c3e50;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
        }

        table th {
            background: #1abc9c;
            color: white;
        }

        table tr:nth-child(even) {
            background: #3d566e;
        }

        table tr:nth-child(odd) {
            background: #2c3e50;
        }

        table tr:hover {
            background: rgba(26, 188, 156, 0.2);
        }

        .btn {
            display: inline-block;
            margin: 5px 0;
            padding: 8px 12px;
            background: #1abc9c;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.15s;
        }

        .btn:hover {
            background: #16a085;
            transform: translateY(-2px);
        }

        .actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .center {
            text-align: center;
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
    <h1>Lista de Categorias</h1>

    <?php if (!empty($categorias)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($categoria['nome']); ?></td>
                        <td class="actions">
                            <a class="btn" href="index.php?controller=Categoria&action=editar&id=<?php echo $categoria['id']; ?>">✏️ Editar</a>
                            <a class="btn" href="index.php?controller=Categoria&action=deletar&id=<?php echo $categoria['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">🗑️ Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="center">Nenhuma categoria cadastrada.</p>
    <?php endif; ?>

    <div class="button-group">
        <a class="btn" href="index.php?controller=Categoria&action=criar">➕ Adicionar Categoria</a>
        <a class="btn" href="index.php">🏠 Voltar ao Menu</a>
    </div>
</div>
</body>
</html>
