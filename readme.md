<p align="center">
<a href="https://travis-ci.org/jhonatans01/bibliotecaREST"><img src="https://travis-ci.org/jhonatans01/bibliotecaREST.svg" alt="Build Status"></a>
</p>

#Biblioteca REST

Esta API foi desenvolvida utilizando a linguagem PHP (7.1), com o auxílio do framerwork <a href="https://laravel.com">Laravel</a>.
Nela, um aluno cadastrado pode emprestar até 3 livros de uma vez, tendo um prazo de até 15 dias para devolução.


##Execução
Para executar o projeto, basta inserir os arquivos do projeto em um servidor apache (local ou online). Os mais conhecidos são: XAMPP (Windows), LAMP (Linux) e MAMP (macOS).

O SGBD utilizado foi o MySQL. Pode ser alterado, porém não há garantia que o gatilho incluso no código irá funcionar, pois foi desenvolvido no MySQL. Antes de rodar o script do banco, deve-se criar um banco de dados chamado 'biblioteca'. Foi utilizado como
o usuário *root* e sem senha, porém isso pode ser alterado pelo arquivo <u>.env</u>, presente na pasta raiz do projeto.

Após criar o banco no SGBD, deve-se criar e popular as tabelas a partir do seguinte código:
```
php artisan migrate:refresh --seed
```  
##Testes

Para integração contínua, foi utilizado o <a href="https://travis-ci.org/">Travis CI</a> devido à sua facilidade de uso tendo em vista sua integração automática com o GitHub.

Caso deseje executar os testes no ambiente local, é necessário, estando em modo terminal e também dentro da pasta raiz do projeto, rodar o PHP Unit através do seguinte comando :

```
./vendor/bin/phpunit
```

Após executar esse comando, será gerado o arquivo clover.xml, que servirá de input para o teste de cobertura de código. Para executar o teste de cobertura de código, primeramente é necessário ter instalado no computador o
PHP com a extensão <a href="https://xdebug.org/">Xdebug</a> também instalada e ativada.

```
php travis/coverage-checker.php travis/clover.xml 50
```

O número 50 é a porcentagem mínima de cobertura que é definida pelo usuário e, portanto, pode ser alterada. 
