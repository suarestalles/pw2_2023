<?php

require_once "C:/xampp/htdocs/pw2_2023-main/controllers/Bcrypt.php";
require_once "C:/xampp/htdocs/pw2_2023-main/controllers/UsuarioController.php";

    // Inicia a sessão
    
	session_start();

	if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
		$usuarioController = new UsuarioController();
		$usuarioController->login($_POST["usuario"], $_POST["senha"]);
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>

		<link rel="stylesheet" href="../components/style-login.css">
	</head>
	<body>
		<div class="formulario">
			<form action="#" method="POST">
				<h1>LOGIN</h1>
				<input type="text" name="usuario" id="usuario" placeholder="Usuário/E-Mail" required>
				<input type="password" name="senha" id="senha" placeholder="Senha" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
