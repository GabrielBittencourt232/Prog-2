<?php
// ...existing code...
require_once 'Conexao.php';

try {
    $pdo = Conexao::conectar();
    $stmt = $pdo->query(
        "SELECT id, nome, idade, email, curso, 
         DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') AS data_cadastro
         FROM alunos
         ORDER BY data_cadastro DESC"
    );
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
<div class="container">
    <header class="header">
        <h1>Alunos</h1>
        <p class="subtitle">Listagem dos alunos cadastrados</p>
    </header>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">Erro: <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if (empty($alunos)): ?>
        <p class="empty">Nenhum aluno cadastrado.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Cadastrado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $a): ?>
                    <tr>
                        <td data-label="Nome"><?= htmlspecialchars($a['nome']) ?></td>
                        <td data-label="Idade"><?= htmlspecialchars($a['idade']) ?></td>
                        <td data-label="Email"><?= htmlspecialchars($a['email']) ?></td>
                        <td data-label="Curso"><?= htmlspecialchars($a['curso']) ?></td>
                        <td data-label="Cadastrado"><?= htmlspecialchars($a['data_cadastro']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
