<?php

class Login
{
    private $_matricula, $_email, $_senha;

    public function getMatricula()
    {
        return $this->_matricula;
    }

    public function setMatricula($matricula)
    {
        $this->_matricula = $matricula;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getSenha()
    {
        return $this->_senha;
    }

    public function setSenha($senha)
    {
        $this->_senha = $senha;
    }
}