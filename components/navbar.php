<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Área para os Scripts CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Título da Página -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?pg=produtos">Produtos</a>
					</li>
				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?pg=categorias">Categorias</a>
					</li>
				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?pg=marcas">Marcas</a>
					</li>
				</ul>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php if(isset($_SESSION["usuario"])) { echo "<p class='p-2'>Seja bem vindo <b>". $_SESSION["usuario"] ."</b> </p>"; ?>

                            <li class="nav-item">
                                <a class="nav-link" href="?pg=logout">Sair</a>
                            </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="views/form_login.php">Login</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
			</div>
		</div>
	</nav>
    <!-- Área para os Scripts Java Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>