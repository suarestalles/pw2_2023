<?php
require_once "controllers/VendaController.php";
include_once("restrict.php");

if (isset($_GET["id"])) {
    $vendaController = new VendaController();
    $vendaController->delete($_GET["id"]);

    // Voltando pra tela anterior
    header("Location: ?pg=vendas");
}
