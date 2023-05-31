<?php

include_once("restrict.php");

  if (
    isset($_POST["nome"]) &&
    isset($_POST["percLucroProduto"]) &&
    isset($_POST["categoria"]) &&
    isset($_POST["marca"])
  ) {
    $produtoController = new ProdutoController();

    $categoriaController = new CategoriaController();
    $categoria = $categoriaController->findById($_POST["categoria"]);

    $marcaController = new MarcaController();
    $marca = $marcaController->findById($_POST["marca"]);

    $produto = new Produto(null, $_POST["nome"], $_POST["percLucroProduto"], $categoria, $marca);

    $produtoController->save($produto);

    header("Location: ?pg=produtos");
  }
?>

<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<h1>Cadastro de Produto</h1>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome"></label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Nome do Produto" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percLucroProduto"></label>  
  <div class="col-md-4">
  <input id="percLucroProduto" name="percLucroProduto" type="number" placeholder="Percentual de Lucro" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="categoria"></label>
  <div class="col-md-4">
    <select id="categoria" name="categoria" class="form-control">
      <?php 
        $controller = new CategoriaController();
        $categorias = $controller->findAll();
        foreach ($categorias as $categoria) :
          echo "<option value=" . $categoria->getId() . ">" . $categoria->getNome() . "</option>";
        endforeach;
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="marca"></label>
  <div class="col-md-4">
    <select id="marca" name="marca" class="form-control">
      <?php 
        $controller = new MarcaController();
        $marcas = $controller->findAll();
        foreach ($marcas as $marca) :
          echo "<option value=" . $marca->getId() . ">" . $marca->getNome() . "</option>";
        endforeach;
      ?>
    </select>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="salvarProduto"></label>
  <div class="col-md-8">
    <input type="submit" value="Salvar" class="btn btn-success">
    <button id="cancelarProduto" name="cancelarProduto" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
