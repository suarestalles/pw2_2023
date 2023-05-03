<?php

class Conexao {
    private static $conexao = null;
    private static $host = "10.5.10.10";
    private static $usuario = "desenv";
    private static $senha = "123456";
    private static $banco = "pw2_2023_talles";

    private function __construct() {}

    public static function getInstance() {
        if (self::$conexao === null) {
            try {
                self::$conexao = new PDO("mysql:host=" . self::$host . ";port=3306;dbname=" . self::$banco, self::$usuario, self::$senha);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }

        return self::$conexao;
    }
}