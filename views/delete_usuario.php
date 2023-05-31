<?php
require_once "controllers/UsuarioController.php";
include_once("restrict.php");

if (isset($_GET["login"])) {
    $usuarioController = new UsuarioController();
    $usuarioController->delete($_GET["login"]);

    // Voltando pra tela anterior
    header("Location: ?pg=usuarios");
}
