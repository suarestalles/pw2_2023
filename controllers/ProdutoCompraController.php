<?php
require "../models/ProdutoCompra.php";

class ProdutoCompraController {
    
    public function findAll() {
        
    }

    public function save(ProdutoCompra $produtoCompra) {
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("INSERT INTO produto_compra (id_usuario, id_produto, id_compra, qtde, preco_custo) VALUES (:id_usuario, :id_produto, :id_compra, :qtde, :preco_custo)");

        $stmt->bindParam(":id_usuario", $produtoCompra->getUsuario()->getId());
        $stmt->bindParam(":id_produto", $produtoCompra->getProduto()->getId());
        $stmt->bindParam(":id_compra", $produtoCompra->getCompra()->getId());
        $stmt->bindParam(":qtde", $produtoCompra->getQtde());
        $stmt->bindParam(":preco_custo", $produtoCompra->getPrecoCusto());

        $stmt->execute();

        $produtoCompra = $this->findById($conexao->lastInsertId());

        return $compra;
    }

    public function update(ProdutoCompra $produtoCompra) {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("UPDATE produtoCompra SET id_usuario = :id_usuario, 
                                                                id_produto = :id_produto,
                                                                id_compra = :id_compra,
                                                                qtde = :qtde,
                                                                preco_custo = :preco_custo WHERE id = :id");

            $stmt->bindParam(":id_usuario", $produtoCompra->getUsuario()->getId());
            $stmt->bindParam(":id_produto", $produtoCompra->getProduto()->getId());
            $stmt->bindParam(":id_compra", $produtoCompra->getCompra()->getId());
            $stmt->bindParam(":qtde", $produtoCompra->getQtde());
            $stmt->bindParam(":preco_custo", $produtoCompra->getPrecoCusto());
            $stmt->bindParam(":id", $produtoCompra->getId());

            $stmt->execute();

            return $this->findById($compra->getId());
        } catch (PDOException $e) {
            echo "Erro ao atualizar a compra: " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $conexao = Conexao::getInstance();

            // Excluir a compra
            $stmt = $conexao->prepare("DELETE FROM produto_compra WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensagem'] = 'Compra excluída com sucesso!';
                return true;
            } else {
                $_SESSION['mensagem'] = 'A compra não foi encontrada.';
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = 'Erro ao excluir a compra: ' . $e->getMessage();
            return false;
        }
    }

    public function findById($id){
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM produto_compra WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return new ProdutoCompra($resultado["id"], $usuario, $produto,$resultado["nome"], );
        } catch (PDOException $e) {
            echo "Erro ao buscar a compra: " . $e->getMessage();
        }
    }
}