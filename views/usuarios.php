<?php
require_once "C:/xampp/htdocs/pw2_2023-main/controllers/UsuarioController.php";
include_once("restrict.php");

$controller = new UsuarioController();
$usuarios = $controller->findAll();

// Verificar se existe uma mensagem definida na sessão
if (isset($_SESSION['mensagem'])) {
    echo "<script>alert('" . $_SESSION['mensagem'] . "')</script>";
    unset($_SESSION['mensagem']); // Limpar a variável de sessão após exibir o alerta
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between mb-3">
                <h1 class="text-center mb-0">Lista de Usuários</h1>
                <a href="?pg=form_usuario" class="btn btn-success" role="button">Cadastrar</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario->getId()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getNome()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getLogin()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getSenha()); ?></td>
                            <td>
                                <a class="" href="?pg=form_usuario&id=<?php echo $usuario->getId(); ?>">
                                    <i class="fas fa-eye"></i></a>
                                <a class="" href="?pg=delete_usuario&login=<?php echo $usuario->getLogin(); ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>