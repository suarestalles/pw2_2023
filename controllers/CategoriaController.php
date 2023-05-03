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
    }
    public function update(Categoria $categoria){
    }
    public function delete(Categoria $categoria){
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