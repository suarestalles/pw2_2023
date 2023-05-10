<?php
class CategoriaController {
    public function findAll(){
        
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM categoria");

        $stmt->execute();
        $categorias = array();

        while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)){
            $categorias[] = new Categoria($categoria["id"], $categoria["nome"]);
        }

        return $categorias;
    }
    public function save(Categoria $categoria){
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("INSERT INTO categoria (nome) VALUE (:nome)");

            $stmt->bindParam(":nome", $categoria->getNome());

            $stmt->execute();

            $categoria->setId($conexao->lastInsertId());

            return $categoria;
        } catch(PDOException $e) {
            echo "Erro ao inserir a categoria: " . $e->getMessage();
        }
    }
    public function update(Categoria $categoria){
    }
    public function delete(Categoria $categoria){
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("DELETE FROM categoria WHERE id = :id");

            $stmt->bindParam(":id", $categoria->getId());

            $stmt->execute();

            return $categoria;
        } catch(PDOException $e) {
            echo "Erro ao excluir a categoria: " . $e->getMessage();
        }
    }
    public function findById($id){
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM categoria WHERE id = :id");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            $categoria = new Categoria($resultado["id"], $resultado["nome"]);


            return $categoria;
        } catch(PDOException $e) {
            echo "Erro ao buscar a categoria: " . $e->getMessage();
        }
    }
}