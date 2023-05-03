<?php 
    $controller = new ProdutoController();
    $produtos = $controller->findAll();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-5">Lista de Produtos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Percentual de Lucro</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                            <td><?php echo number_format($produto->getPercentualLucro(), 2, ',', '.') . '%'; ?></td>
                            <td><?php echo htmlspecialchars($produto->getCategoria()->getNome()); ?></td>
                            <td><?php echo htmlspecialchars($produto->getMarca()->getNome()); ?></td>
                            <td>
                                <a href="views/detalhes_produto.php?id=<?php echo $produto->getId(); ?>" class="btn btn-primary">Detalhes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 