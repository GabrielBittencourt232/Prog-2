<?php
// ...existing code...
require_once 'Conexao.php';

$id = 0;
$nome = '';
$idade = '';
$email = '';
$curso = '';
$error = '';

try {
    $pdo = Conexao::conectar();

    // Se formulário enviado (criar ou atualizar)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $nome = trim($_POST['nome'] ?? '');
        $idade = trim($_POST['idade'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $curso = trim($_POST['curso'] ?? '');

        // Validações básicas
        if ($nome === '' || $email === '') {
            throw new Exception('Nome e email são obrigatórios.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email inválido.');
        }
        if (!is_numeric($idade) || (int)$idade < 16 || (int)$idade > 100) {
            throw new Exception('Idade deve ser um número entre 16 e 100.');
        }

        if ($id > 0) {
            // Atualizar
            $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, idade = ?, email = ?, curso = ? WHERE id = ?");
            $stmt->execute([$nome, (int)$idade, $email, $curso, $id]);
        } else {
            // Inserir
            $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, (int)$idade, $email, $curso]);
        }

        header('Location: listar_alunos.php');
        exit;
    }

    // Se veio com ?id= -- carregar para edição
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = (int)$_GET['id'];
        $stmt = $pdo->prepare("SELECT id, nome, idade, email, curso FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $nome = $row['nome'];
            $idade = $row['idade'];
            $email = $row['email'];
            $curso = $row['curso'];
        } else {
            $error = 'Aluno não encontrado.';
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?= $id ? 'Editar' : 'Cadastrar' ?> Aluno</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        /* pequenos ajustes ao estilo existente */
        form.form-card { max-width:720px; margin:16px auto; padding:14px; background:#fbfdff; border-radius:8px; box-shadow:0 6px 20px rgba(15,23,42,0.04); }
        .form-row { display:flex; gap:12px; flex-wrap:wrap; margin-bottom:10px; }
        .form-field { flex:1 1 220px; display:flex; flex-direction:column; }
        label { font-size:13px; color:#334155; margin-bottom:6px; }
        input[type="text"], input[type="number"], input[type="email"] { padding:10px 12px; border:1px solid #e6eef7; border-radius:6px; background:#fff; }
        .actions { display:flex; gap:10px; margin-top:12px; }
        .btn { padding:10px 14px; border-radius:8px; text-decoration:none; display:inline-block; }
        .btn-primary { background:#0b63ff; color:#fff; border:none; }
        .btn-secondary { background:#eef5ff; color:#0b3a5a; border:none; }
        .message { padding:10px; border-radius:6px; margin-bottom:12px; }
        .message.error { background:#fff0f1; color:#b91c1c; }
    </style>
</head>
<body>
<div class="container">
    <header class="header">
        <h1><?= $id ? 'Editar' : 'Cadastrar' ?> Aluno</h1>
        <p class="subtitle"><?= $id ? 'Atualize os dados do aluno' : 'Preencha os dados para cadastrar um novo aluno' ?></p>
    </header>

    <?php if ($error): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="form-card" method="post" action="form_aluno.php<?= $id ? '?id=' . $id : '' ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <div class="form-row">
            <div class="form-field">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" value="<?= htmlspecialchars($nome) ?>" required maxlength="100">
            </div>
            <div class="form-field">
                <label for="idade">Idade</label>
                <input id="idade" name="idade" type="number" min="16" max="100" value="<?= htmlspecialchars($idade) ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?= htmlspecialchars($email) ?>" required maxlength="100">
            </div>
            <div class="form-field">
                <label for="curso">Curso</label>
                <input id="curso" name="curso" type="text" value="<?= htmlspecialchars($curso) ?>" maxlength="50">
            </div>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary"><?= $id ? 'Atualizar' : 'Cadastrar' ?></button>
            <a href="listar_alunos.php" class="btn btn-secondary">Voltar para a lista</a>
        </div>
    </form>
</div>
</body>
</html>