<?php
require_once "models\Produto.php";
require_once "models\Venda.php";

class ProdutoVenda
{
    private $id;

    private $qtde;

    private $valor_unitario;

    private $valor_total;

    private $produto;

    private $venda;

    private $usuario;

    public function __construct($id, $qtde, Produto $produto, Venda $venda, $valor_unitario, $valor_total, Usuario $usuario)
    {
        $this->id = $id;
        $this->valor_unitario = $valor_unitario;
        $this->valor_total = $valor_total;
        $this->qtde = $qtde;
        $this->produto = $produto;
        $this->venda = $venda;
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

    public function getVenda()
    {
        return $this->venda;
    }

    public function setVenda(Venda $venda)
    {
        $this->venda = $venda;

        return $this;
    }

    public function getPrecoUnitario()
    {
        return $this->valor_unitario;
    }

    public function setPrecoUnitario($valor_unitario)
    {
        $this->valor_unitario = $valor_unitario;

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

    public function getValorTotal()
    {
        return $this->valor_total;
    }

    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;

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
