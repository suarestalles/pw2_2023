<?php
require "Produto.php";
require "Compra.php";

class ProdutoCompra {
    private $id;
    private $precoCusto;
    private $quantidade;
    private $produto;
    private $compra;

    public function __construct($id, $precoCusto, $quantidade, Produto $produto, Compra $compra){
        $this->precoCusto = $precoCusto;
        $this->quantidade = $quantidade;
        $this->produto = $produto;
        $this->compra = $compra;
    }
   
    public function getPrecoCusto()
    {
        return $this->precoCusto;
    }

    public function setPrecoCusto($precoCusto)
    {
        $this->precoCusto = $precoCusto;
        return $this;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }
    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto(Produto $produto)
    {
        $this->produto = $produto;
        return $this;
    }
    public function getCompra()
    {
        return $this->compra;
    }

    public function setCompra(Compra $compra)
    {
        $this->compra = $compra;
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

