<?php
require "Categoria.php";
require "Marca.php";

class Produto {
    private $id;
    private $nome;
    private $percentualLucro;
    private $categoria;
    private $marca;

    public function __construct($id, $nome, $percentualLucro, Categoria $categroria, Marca $marca){
        $this->id = $id;
        $this->nome = $nome;
        $this->percentualLucro = $percentualLucro;
        $this->categoria = $categoria;
        $this->marca = $marca;
    }
   
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getPercentualLucro()
    {
        return $this->percentualLucro;
    }

    public function setPercentualLucro($percentualLucro)
    {
        $this->percentualLucro = $percentualLucro;
        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca(Marca $marca)
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

