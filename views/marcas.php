<?php 
    $controller = new MarcaController();
    $marcas = $controller->findAll();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-5">Lista de Marcas</h1>
            <table class="table">
                <a href="?pg=cadastroMarca" class="btn btn-success text-end">Cadastrar</a>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $marca): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($marca->getId()); ?></td>
                            <td><?php echo htmlspecialchars($marca->getNome()); ?></td>
                            <td class="text-end">
                                <a href="" class="btn btn-primary text-end">Detalhes</a>
                                <a href="" class="btn btn-warning text-end">Editar</a>
                                <a href="" class="btn btn-danger text-end">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 