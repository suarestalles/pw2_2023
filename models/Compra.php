<?php
require "Usuario.php";

class Compra {
    private $id;
    private $dtHora;
    private $usuario;

    public function __construct($id, $dtHora, Usuario $usuario){
        $this->id = $id;
        $this->dtHora = $dtHora;
        $this->usuario = $usuario;
    }
   
    public function getDtHora()
    {
        return $this->dtHora;
    }

    public function setDtHora($dtHora)
    {
        $this->dtHora = $dtHora;
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

