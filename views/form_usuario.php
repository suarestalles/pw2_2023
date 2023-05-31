<?php
require_once "C:/xampp/htdocs/pw2_2023-main/controllers/UsuarioController.php";
include_once("restrict.php");

if (isset($_GET["id"])) {
	$usuarioController = new UsuarioController();
	$usuario = $usuarioController->findById($_GET["id"]);
}

// Salva quando recebe dados do formulário
if (
	isset($_POST["nome"]) &&
	isset($_POST["login"]) &&
	isset($_POST["senha"])
) {
	$usuarioController = new UsuarioController();

	// Construindo o Usuario
	$usuario = new Usuario(null, $_POST["nome"], $_POST["login"], $_POST["senha"]);

	// Salvando ou Atualizando usuario
	if (isset($_GET["id"])) {
		$usuario->setId($_GET["id"]);
		$usuarioController->update($usuario);
	} else {
		$usuarioController->save($usuario);
	}

	// Voltando pra tela anterior
	header("Location: ?pg=usuarios");

	// Encerra a execução do script php
	exit();
}

?>


<div class="container mt-2">
	<h1 class="text-center mb-0">Cadastro de Usuários</h1>
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($usuario) ? $usuario->getNome() : ''; ?>">
		</div>
		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" class="form-control" id="login" name="login" value="<?php echo isset($usuario) ? $usuario->getLogin() : ''; ?>">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" id="senha" name="senha" value="<?php echo isset($usuario) ? $usuario->getSenha() : ''; ?>">
		</div>
		<input type="submit" class="btn btn-primary" id="salvar" name="salvar" value="Salvar">
	</form>
</div>