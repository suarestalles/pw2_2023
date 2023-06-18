<?php
require_once "controllers/CompraController.php";
include_once("restrict.php");

if (isset($_GET["id"])) {
    $compraController = new CompraController();
    $compraController->delete($_GET["id"]);

    // Voltando pra tela anterior
    header("Location: ?pg=compras");
}
