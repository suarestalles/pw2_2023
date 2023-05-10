<?php
  if (
    isset($_POST["nome"])
  ) {
    $marcaController = new MarcaController();
    $marca = new Marca(null, $_POST["nome"]);

    $marcaController->save($marca);

    header("Location: ?pg=marcas");
  }
?>

<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<h1>Cadastro de Marca</h1>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Marca:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="salvarMarca"></label>
  <div class="col-md-8">
    <input type="submit" value="Salvar" class="btn btn-success">
  </div>
</div>

</fieldset>
</form>
