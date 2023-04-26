<?php
require "Produto.php";
require "Venda.php";

class ProdutoVenda {
    private $id;
    private $quantidade;
    private $valorUnitario;
    private $valorTotal;
    private $produto;
    private $venda;

    public function __construct($id, $quantidade, $valorUnitario, $valorTotal, Produto $produto, Venda $venda){
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
        $this->valorTotal = $valorTotal;
        $this->produto = $produto;
        $this->venda = $venda;
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
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
        return $this;
    }
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
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
    public function getVenda()
    {
        return $this->venda;
    }
    public function setVenda(Venda $venda)
    {
        $this->venda = $venda;
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

