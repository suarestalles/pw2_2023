<?php

class Compra
{
    private $id;
    private $dt_hora;

    //private $produtos = array();

    public function __construct($id, $dt_hora, $produtos)
    {
        $this->id = $id;
        $this->dt_hora = $dt_hora;
    }

    public function getDataHora()
    {
        return $this->dt_hora;
    }

    public function setDataHora($dt_hora)
    {
        $this->dt_hora = $dt_hora;
        return $this;
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

    
}
