<?php

class Conexao {
    private static $conexao = null;
    private static $host = "127.0.0.1";
    private static $usuario = "root";
    private static $senha = "root";
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
