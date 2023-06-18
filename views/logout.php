<?php
    session_start();
    
    unset($_SESSION["id_usuario"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["login"]);
    unset($_SESSION["senha"]);
    header("Location: views/form_login.php");
