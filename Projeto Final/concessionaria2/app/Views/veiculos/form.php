<?php 
// Verifica se a variável $veiculo existe (Modo Edição)
$isEdit = isset($veiculo);
$title = $isEdit ? 'Editar Veículo' : 'Novo Veículo';
$action = '/veiculo/save';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <form action="<?= $action ?>" method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $veiculo->getId() ?>">
        <?php endif; ?>

        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" value="<?= $isEdit ? $veiculo->getMarca() : '' ?>" required><br><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" id="modelo" name="modelo" value="<?= $isEdit ? $veiculo->getModelo() : '' ?>" required><br><br>

        <label for="ano">Ano:</label><br>
        <input type="number" id="ano" name="ano" value="<?= $isEdit ? $veiculo->getAno() : '' ?>" required><br><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="text" id="preco" name="preco" value="<?= $isEdit ? $veiculo->getPreco() : '' ?>" required><br><br>
        
        <label for="cor">Cor:</label><br>
        <input type="text" id="cor" name="cor" value="<?= $isEdit ? $veiculo->getCor() : '' ?>" required><br><br>

        <label for="quilometragem">Quilometragem (KM):</label><br>
        <input type="number" id="quilometragem" name="quilometragem" value="<?= $isEdit ? $veiculo->getQuilometragem() : '' ?>" required><br><br>

        <button type="submit">Salvar</button>
        <a href="/veiculo/index">Cancelar</a>
    </form>
</body>
</html>