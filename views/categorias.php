<?php 
    $controller = new CategoriaController();
    $categorias = $controller->findAll();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-5">Lista de Categorias</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($categoria->getId()); ?></td>
                            <td><?php echo htmlspecialchars($categoria->getNome()); ?></td>
                            <td class="text-end">
                                <a href="" class="btn btn-primary text-end">Detalhes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 