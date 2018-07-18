<?php

class Idioma
{
    private $_id, $_titulo;

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getTitulo()
    {
        return $this->_titulo;
    }

    public function setTitulo($titulo)
    {
        $this->_titulo = $titulo;
    }
}