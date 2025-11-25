<?php $title = "Catálogo de Veículos"; // Define o título para o master.php ?>

<h1 class="mb-4 text-center text-primary"><?= $title ?></h1>
<p class="mb-3">
    <a href="/veiculo/create" class="btn btn-success">
        <i class="fas fa-plus"></i> Novo Veículo
    </a>
</p>

<?php if (!empty($veiculos)): ?>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Quilometragem</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?= $veiculo->id ?></td>
                    <td><?= $veiculo->marca ?></td>
                    <td><?= $veiculo->modelo ?></td>
                    <td><?= $veiculo->ano ?></td>
                    <td>R$ <?= number_format($veiculo->preco, 2, ',', '.') ?></td>
                    <td><?= number_format($veiculo->quilometragem, 0, ',', '.') ?> KM</td>
                    <td class="text-center">
                        <a href="/veiculo/edit/<?= $veiculo->id ?>" class="btn btn-sm btn-info">Editar</a> 
                        <a href="/veiculo/delete/<?= $veiculo->id ?>" 
                           onclick="return confirm('Tem certeza que deseja excluir?');" 
                           class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        Nenhum veículo cadastrado.
    </div>
<?php endif; ?>