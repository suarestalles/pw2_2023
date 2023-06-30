<?php
include_once("restrict.php");
require_once "controllers/VendaController.php";
require_once "controllers/ProdutoController.php";
require_once "controllers/ProdutoVendaController.php";
require_once "models/ProdutoVenda.php";
require_once "models/Produto.php";

if (isset($_SESSION['mensagem'])) {
	echo "<script>alert('" . $_SESSION['mensagem'] . "')</script>";
	unset($_SESSION['mensagem']); // Limpar a variável de sessão após exibir o alerta
}

if (isset($_POST["finalizarVenda"])) {
	unset($_SESSION["venda_id"]);
	header("Location: ?pg=vendas");
	exit();
}

if (isset($_GET['id'])) {
	$_SESSION['venda_id'] = $_GET['id'];
} else {
	$vendaController = new VendaController();
	$venda = new Venda(null, null);
	$venda = $vendaController->save();
	$_SESSION['venda_id'] = $venda->getId();
}


$produtoVendaController = new ProdutoVendaController();

if (isset($_POST['adicionarProduto'])) {
	$produtoController = new ProdutoController();
	$vendaController = new VendaController();
	$usuarioController = new UsuarioController();
	// Dados do formulário
	$usuario = $usuarioController->findById($_SESSION['id_usuario']);
	$produto = $produtoController->findById($_POST['produto']);
	$venda = $vendaController->findById($_SESSION["venda_id"]);
	$qtde = $_POST['qtde'];
	$valorUnitario = $_POST['valor_unitario'];
	$valorTotal = $_POST['valor_total'];

	// Criar uma nova instância de ProdutoVenda
	$produtoVenda = new ProdutoVenda(null, $qtde, $valorUnitario, $valorTotal, $produto, $venda, $usuario);

	$produtoVendaController->save($produtoVenda);
}

$produtosVenda = $produtoVendaController->findAll($_SESSION["venda_id"]);

?>

<div class="container mt-2">
	<h1 class="text-center mb-0">Cadastro de Venda</h1>
	<br>
	<form method="POST">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="produto">Produto</label>
				<select class="form-control" id="produto" name="produto" required>
					<?php
					$produtoController = new ProdutoController();
					$produtos = $produtoController->findAll();
					foreach ($produtos as $produto) :
						echo "<option value=" . $produto->getId() . ">" . $produto->getNome() . "</option>";
					endforeach;
					
					?>
				</select>
			</div>

			<div class="form-group col-md-3">
				<label for="qtde">Quantidade</label>
				<input type="text" class="form-control" id="qtde" name="qtde" required>
			</div>

			<div class="form-group col-md-3">
				<label for="valor_unitario">Valor Unitário</label>
				<input type="text" class="form-control" id="valor_unitario" name="valor_unitario" required>
			</div>

			<div class="form-group col-md-3">
				<label for="valor_total">Valor Total</label>
				<input type="text" class="form-control" id="valor_total" name="valor_total" required>
			</div>

			<div class="form-group col-md-3 align-self-end">
				<input type="submit" class="btn btn-primary" id="salvar" name="adicionarProduto" value="Adicionar Produto">
			</div>

		</div>
	</form>
	<form method="POST">
		<input type="submit" class="btn btn-success" id="finalizar" name="finalizarVenda" value="Finalizar Venda">
	</form>
</div>

<div class="container mt-5">
	<div class="row">
		<div class="col">
			<div class="d-flex justify-content-between mb-3">
				<h3 class="text-center mb-0">Lista de Produtos</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Produto</th>
						<th>Qtde</th>
						<th>Valor Unitário</th>
						<th>Valor Total</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtosVenda as $key => $produtoVenda) : ?>
						<tr>
							<td><?php echo htmlspecialchars($produtoVenda->getId()); ?></td>
							<td><?php echo htmlspecialchars($produtoVenda->getProduto()->getNome()); ?></td>
							<td><?php echo number_format($produtoVenda->getQtde(), 2, ',', '.'); ?></td>
							<td><?php echo "R\$ " . number_format($produtoVenda->getValorUnitario(), 2, ',', '.'); ?></td>
							<td><?php echo "R\$ " . number_format($produtoVenda->getValorTotal(), 2, ',', '.'); ?></td>
							<td>
								<a class="" href="?pg=delete_produto_venda&id=<?php echo $produtoVenda->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
									<i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>