<?php

class Livro
{
    private $_cod, $_codGeral, $_titulo, $_paginas, $_edicao, $_ano, $_idioma;

    public function getCod()
    {
        return $this->_cod;
    }

    public function setCod($cod)
    {
        $this->_cod = $cod;
    }

    public function getCodGeral()
    {
        return $this->_codGeral;
    }

    public function setCodGeral($codGeral)
    {
        $this->_codGeral = $codGeral;
    }

    public function getTitulo()
    {
        return $this->_titulo;
    }

    public function setTitulo($titulo)
    {
        $this->_titulo = $titulo;
    }

    public function getPaginas()
    {
        return $this->_paginas;
    }

    public function setPaginas($paginas)
    {
        $this->_paginas = $paginas;
    }

    public function getEdicao()
    {
        return $this->_edicao;
    }

    public function setEdicao($edicao)
    {
        $this->_edicao = $edicao;
    }

    public function getAno()
    {
        return $this->_ano;
    }

    public function setAno($ano)
    {
        $this->_ano = $ano;
    }

    public function getIdioma()
    {
        return $this->_idioma;
    }

    public function setIdioma($idioma)
    {
        $this->_idioma = $idioma;
    }
}