<?php
require_once "controllers/ProdutoController.php";
include_once("restrict.php");

if (isset($_GET["id"])) {
	$compraController = new CompraController();
	$compra = $compraController->findById($_GET["id"]);
}

// Salva quando recebe dados do formulário
if (
	isset($_POST["addProdutoCompra"])
) {
	$produtoCompra = new ProdutoCompra($_POST["usuario"], $_POST["produto"], $_POST["compra"], $_POST["qtde"], $_POST["preco_custo"]);
}

?>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="buttondropdown">Produto</label>
  <div class="col-md-4">
    <div class="input-group">
      <input id="buttondropdown" name="buttondropdown" class="form-control" placeholder="Selecione o Produto" type="text" required="">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          +
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-right">
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qtde">Quantidade</label>  
  <div class="col-md-4">
  <input id="qtde" name="qtde" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="preco_custo">Preço de Custo</label>  
  <div class="col-md-4">
  <input id="preco_custo" name="preco_custo" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="addProdutoCompra"></label>
  <div class="col-md-4">
    <button id="addProdutoCompra" name="addProdutoCompra" class="btn btn-primary">Add Produto</button>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-success">Finalizar Compra</button>
  </div>
</div>

</fieldset>
</form>
