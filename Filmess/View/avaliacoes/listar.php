<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Avaliações</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #2c3e50;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: #1abc9c;
            color: white;
        }
        tr:nth-child(even) {
            background: #3d566e;
        }
        tr:nth-child(odd) {
            background: #2c3e50;
        }
        .actions a {
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
        }
        .actions a:hover {
            opacity: 0.8;
        }
        .edit {
            background: #f39c12;
        }
        .delete {
            background: #e74c3c;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #1abc9c;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover {
            background: #16a085;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Avaliações</h1>

        <?php if (!empty($avaliacoes)): ?>
            <table>
                <tr>
                    <th>Filme</th>
                    <th>Categoria</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($avaliacao['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($avaliacao['categoria']); ?></td>
                        <td><?php echo htmlspecialchars($avaliacao['nota']); ?></td>
                        <td class="actions">
                            <a class="edit" href="index.php?controller=Avaliacao&action=editar&id=<?php echo $avaliacao['id']; ?>">Editar</a>
                            <a class="delete" href="index.php?controller=Avaliacao&action=deletar&id=<?php echo $avaliacao['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhuma avaliação cadastrada.</p>
        <?php endif; ?>

        <a class="btn" href="index.php?controller=Avaliacao&action=criar">➕ Adicionar nova avaliação</a>
        <a class="btn" href="index.php">🏠 Voltar ao Menu</a>
    </div>
</body>
</html>
