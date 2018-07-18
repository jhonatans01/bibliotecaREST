<?php

class Carro
{
    private $_cor;

    public function getCor()
    {
        return $this->_cor;
    }

    public function setCor($cor)
    {
        $this->_cor = $cor;
    }

}