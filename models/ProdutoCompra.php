<?php
require_once "models\Produto.php";
require_once "models\Compra.php";

class ProdutoCompra
{
    private $id;

    private $preco_custo;

    private $qtde;

    private $produto;

    private $compra;

    private $usuario;

    public function __construct($id, $preco_custo, $qtde, Produto $produto, Compra $compram, Usuario $usuario)
    {
        $this->id = $id;
        $this->preco_custo = $preco_custo;
        $this->qtde = $qtde;
        $this->produto = $produto;
        $this->compra = $compra;
        $this->usuario = $usuario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getPrecoCusto()
    {
        return $this->preco_custo;
    }

    public function setPrecoCusto($preco_custo)
    {
        $this->preco_custo = $preco_custo;

        return $this;
    }

    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($qtde)
    {
        $this->qtde = $qtde;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}
