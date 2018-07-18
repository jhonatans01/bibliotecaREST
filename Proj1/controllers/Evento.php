<?php
namespace controllers{
    /*
    Classe evento
    */
    class Evento {
        //Atributo para banco de dados
        private $PDO;

        /*
        __construct
        Conectando ao banco de dados
        */
        function __construct(){
            $this->PDO = new \PDO('mysql:host=localhost;dbname=marciana', 'root', ''); //Conexão
            $this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO
        }
        /*
        lista
        Listand eventos
        */
        public function lista(){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM evento ORDER BY dataInicio DESC");
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        public function listaByUser($id){
            global $app;
            $sth = $this->PDO->prepare("SELECT e.* FROM evento e JOIN organizador o ON e.organizador_id = o.id AND o.id = :o_id ORDER BY e.id");
            $sth ->bindValue(':o_id',$id);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }
        /*
        get
        param $id
        Pega evento pelo id
        */
        public function get($id){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM evento WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $sth->execute();
            $result = $sth->fetch(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        /*
        nova
        Cadastra evento
        */
        public function novo(){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $keys = array_keys($dados); //Paga as chaves do array
            /*
            O uso de prepare e bindValue é importante para se evitar SQL Injection
            */
            $sth = $this->PDO->prepare("INSERT INTO evento (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }


            $sth ->bindValue(':'.$key,$value);
            $sth->execute();
            //Retorna o id inserido
            $app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
        }

        /*
        editar
        param $id
        Editando evento
        */
        public function editar($id){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $sets = [];
            foreach ($dados as $key => $VALUES) {
                $sets[] = $key." = :".$key;
            }

            $sth = $this->PDO->prepare("UPDATE evento SET ".implode(',', $sets)." WHERE id = :id");
            $sth ->bindValue(':id',$id);
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            //Retorna status da edição
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }

        /*
        excluir
        param $id
        Excluindo evento
        */
        public function excluir($id){
            global $app;
            $sth = $this->PDO->prepare("DELETE FROM evento WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }

        public function geocode($a) {
            $geo= array();
            //$a = "Rua Paulo Guimarães, São Paulo - SP"; // Pega parâmetro
            $addr = str_replace(" ", "+", $a); // Substitui os espaços por + "Rua+Paulo+Guimarães,+São+Paulo+-+SP" conforme padrão 'maps.google.com'
            $address = utf8_encode($addr); // Codifica para UTF-8 para não dar 'pau' no envio do parâmetro

            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
            $output = json_decode($geocode);
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;

            $geo['lat']=$lat;
            $geo['long']=$long;

            return $geo;
        }
    }
}