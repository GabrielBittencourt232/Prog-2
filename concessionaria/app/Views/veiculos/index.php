<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Concessionária | Veículos</title>
</head>
<body>
    <h1>Catálogo de Veículos</h1>
    <p><a href="/veiculo/create">Novo Veículo</a></p>
    
    <?php if (!empty($veiculos)): ?>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Quilometragem</th>
                    <th>Ações</th>
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
            
            <td>
                <a href="/veiculo/edit/<?= $veiculo->id ?>">Editar</a> |
                <a href="/veiculo/delete/<?= $veiculo->id ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
     </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum veículo cadastrado.</p>
    <?php endif; ?>
</body>
</html>