<?php

include_once("restrict.php");

  if (
    isset($_POST["nome"])
  ) {
    $categoriaController = new CategoriaController();
    $categoria = new categoria(null, $_POST["nome"]);

    $categoriaController->save($categoria);

    header("Location: ?pg=categorias");
  }
?>

<form class="form-horizontal col" method="POST">
<fieldset>

<!-- Form Name -->
<h1>Cadastro de Categoria</h1>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Categoria:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="salvarCategoria"></label>
  <div class="col-md-8">
    <input type="submit" value="Salvar" class="btn btn-success">
  </div>
</div>

</fieldset>
</form>

 