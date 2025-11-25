<?php 
// Variáveis necessárias para o formulário
$isEdit = isset($veiculo) && $veiculo->getId() !== null;
$title = $isEdit ? "Editar Veículo (ID: {$veiculo->getId()})" : "Novo Veículo";
?>

<h1 class="mb-4 text-primary"><?= $title ?></h1>

<form action="/veiculo/save" method="POST">

    <?php if ($isEdit): ?>
        <input type="hidden" name="id" value="<?= $veiculo->getId() ?>">
    <?php endif; ?>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca:</label>
        <input type="text" id="marca" name="marca" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getMarca() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo:</label>
        <input type="text" id="modelo" name="modelo" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getModelo() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="ano" class="form-label">Ano:</label>
        <input type="number" id="ano" name="ano" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getAno() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço (R$):</label>
        <input type="number" step="0.01" id="preco" name="preco" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getPreco() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="cor" class="form-label">Cor:</label>
        <input type="text" id="cor" name="cor" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getCor() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="quilometragem" class="form-label">Quilometragem (KM):</label>
        <input type="number" id="quilometragem" name="quilometragem" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getQuilometragem() : '' ?>" 
               required>
    </div>

    <div class="mb-3">
        <label for="placa" class="form-label">Placa:</label>
        <input type="text" id="placa" name="placa" 
               class="form-control" 
               value="<?= $isEdit ? $veiculo->getPlaca() : '' ?>" 
               required>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary btn-lg">
            Salvar Veículo
        </button>
        <a href="/veiculo/index" class="btn btn-secondary btn-lg">
            Cancelar e Voltar
        </a>
    </div>
</form>