<?php

namespace controllers;


class Login
{
    private $PDO;

    function __construct()
    {
        $this->PDO = new \PDO('mysql:host=localhost;dbname=biblioteca', 'root', ''); //Conexão
        $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); //habilitando erros do PDO
    }

    public function lista(){
        global $app;
        $sth = $this->PDO->prepare("SELECT * FROM login");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $app->render('default.php',["data"=>$result],200);
    }

    public function novoUsuario()
    {
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados) == 0) ? $_POST : $dados;
        $keys = array_keys($dados);

        $sth = $this->PDO->
                prepare("INSERT INTO login (" . implode(',', $keys) . ") VALUES (:" . implode(",:", $keys) . ")");
        foreach ($dados as $key => $value) {
            $sth->bindValue(':' . $key, $value);
        }

        $sth->execute();
        //Retorna o id inserido
        $app->render('default.php', ["data" => ['id' => $this->PDO->lastInsertId()]], 200);
    }

    public function editarUsuario($matricula){
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados)==0)? $_POST : $dados;
        $sets = [];
        foreach ($dados as $key => $VALUES) {
            $sets[] = $key." = :".$key;
        }

        $sth = $this->PDO->prepare("UPDATE login SET ".implode(',', $sets)." WHERE matricula = :matricula");
        $sth ->bindValue(':matricula',$matricula);

        foreach ($dados as $key => $value) {
            $sth ->bindValue(':'.$key,$value);
        }
        //Retorna status da edição
        $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
    }



}