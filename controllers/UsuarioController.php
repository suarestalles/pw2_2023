<?php

require_once "C:/xampp/htdocs/pw2_2023-main/models/Conexao.php";
require_once "C:/xampp/htdocs/pw2_2023-main/models/Usuario.php";
require_once "C:/xampp/htdocs/pw2_2023-main/controllers/Bcrypt.php";

class UsuarioController
{
    public function login($login, $senha) {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = :login");

            $stmt->bindParam(":login", $login);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $usuario = new Usuario($resultado["id"], $resultado["nome"], $resultado["login"], $resultado["senha"]);

                if (Bcrypt::check($senha, $usuario->getSenha())) {
                    $_SESSION["login"] = $usuario->getLogin();
                    $_SESSION["nome"] = $usuario->getNome();
                    header("Location: ../index.php");
                } else {
                    echo "Senha inválida";
                }
            } else {
                echo "Usuário inválido";
            }
            
        } catch (PDOException $e) {
            echo "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }
    
    public function logout()
    {
        session_start();
        unset($_SESSION["login"]);
        unset($_SESSION["nome"]);
        header("form-login.php");
    }
    public function findAll() {
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM usuario");

        $stmt->execute();
        $usuarios = array();

        while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($usuario["id"], $usuario["nome"], $usuario["login"], null);
        }

        return $usuarios;
    }
    public function save(Usuario $usuario) {
        $conexao = Conexao::getInstance();

        $userValidation = $this->findByLogin($usuario->getLogin());

        if ($userValidation == true) {
            $_SESSION['mensagem'] = 'Usuário já cadastrado';
            return false;
        } else {
            $stmt = $conexao->prepare("INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)");

            $stmt->bindParam(":nome", $usuario->getNome());
            $stmt->bindParam(":login", $usuario->getLogin());
            $stmt->bindParam(":senha", Bcrypt::hash($usuario->getSenha()));
    
    
            $stmt->execute();
    
            $usuario = $this->findById($conexao->lastInsertId());
    
            return $usuario;
        }
        
    }
    public function update(Usuario $usuario) {
        try {
            $conexao = Conexao::getInstance();

            if($usuario->getSenha() == null) {
                $stmt = $conexao->prepare("UPDATE usuario SET nome = :nome, login = :login WHERE id = :id");
            } else {
                $stmt = $conexao->prepare("UPDATE usuario SET nome = :nome, login = :login, senha = :senha WHERE id = :id");
                $stmt->bindParam(":senha", Bcrypt::hash($usuario->getSenha()));
            }

            $stmt->bindParam(":nome", $usuario->getNome());
            $stmt->bindParam(":login", $usuario->getLogin());
            $stmt->bindParam(":id", $usuario->getId());

            $stmt->execute();

            return $this->findById($usuario->getId());
        } catch (PDOException $e) {
            echo "Erro ao atualizar o usuário: " . $e->getMessage();
        }
    }
    public function delete($login) {
        try {
            $conexao = Conexao::getInstance();

            if ($login == $_SESSION["login"]) {
                $_SESSION['mensagem'] = 'Usuário a ser excluído não pode estar logado!!';
            } else {
                $stmtUsuario = $conexao->prepare("DELETE FROM usuario WHERE login = :login");
                $stmtUsuario->bindParam(":login", $login);
                $stmtUsuario->execute();
    
                if ($stmtUsuario->rowCount() > 0) {
                    $_SESSION['mensagem'] = 'Usuário excluído com sucesso!';
                    return true;
                } else {
                    $_SESSION['mensagem'] = 'O usuário não foi encontrada.';
                    return false;
                }
            }
            
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = 'Erro ao excluir o Usuario: ' . $e->getMessage();
            return false;
        }
    }
    public function findById($id) {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            $usuario = new Usuario($resultado["id"], $resultado["nome"], $resultado["login"], null);

            return $usuario;
        } catch (PDOException $e) {
            echo "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }

    public function findByLogin($login) {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = :login");

            $stmt->bindParam(":login", $login);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar o usuário: " . $e->getMessage();
        }
    }
}
