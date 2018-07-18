<?php
namespace controllers{
    /*
    Classe organizador
    */
    require_once("./vendor/swiftmailer/swiftmailer/lib/swift_required.php");
    define('GUSER', 'espacomarciana@gmail.com');
    define('GPWD', 'InfoPreta');

    class Organizador {
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
        Listand organizadores
        */
        public function lista(){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM organizador");
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }
        /*
        get
        param $id
        Pega organizador pelo id
        */
        public function get($id){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM organizador WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            //$result = $sth->fetch(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        /*
        nova
        Cadastra organizador
        */
        public function novo(){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $keys = array_keys($dados); //Paga as chaves do array
            /*
            O uso de prepare e bindValue é importante para se evitar SQL Injection
            */
            $sth = $this->PDO->prepare("INSERT INTO organizador (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }

            $sth->execute();
            //Retorna o id inserido
            $app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
        }

        /*
        editar
        param $id
        Editando organizador
        */
        public function editar($id){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $sets = [];
            foreach ($dados as $key => $VALUES) {
                $sets[] = $key." = :".$key;
            }

            $sth = $this->PDO->prepare("UPDATE organizador SET ".implode(',', $sets)." WHERE id = :id");
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
        Excluindo organizador
        */
        public function excluir($id){
            global $app;
            $sth = $this->PDO->prepare("DELETE FROM organizador WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }

        public function authUser() {
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $setsLogin = [];
            foreach ($dados as $key => $VALUES) {
                $setsLogin[] = $key." = :".$key;
            }
            $sth = $this->PDO->prepare("SELECT * FROM organizador WHERE ".implode(' and ', $setsLogin));
            foreach ($dados as $key => $value) {
                $sth->bindValue(':'.$key, $value);
            }
            $sth->execute();
            $result = $sth->fetch(\PDO::FETCH_ASSOC);

            $app->render('default.php',["data"=>$result],200);
        }
    }
}