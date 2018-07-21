<p align="center">
<a href="https://travis-ci.org/jhonatans01/bibliotecaREST"><img src="https://travis-ci.org/jhonatans01/bibliotecaREST.svg" alt="Build Status"></a>
</p>

# Biblioteca REST

Esta API foi desenvolvida utilizando a linguagem PHP (7.1), com o auxílio do framerwork <a href="https://laravel.com">Laravel</a>.
Nela, um aluno cadastrado pode emprestar até 3 livros de uma vez, tendo um prazo de até 15 dias para devolução.


## Execução

Para executar o projeto, basta inserir os arquivos do projeto em um servidor apache (local ou online). Os mais conhecidos são: XAMPP (Windows), LAMP (Linux) e MAMP (macOS).

O SGBD utilizado foi o MySQL. Pode ser alterado, porém não há garantia que o gatilho incluso no código irá funcionar, pois foi desenvolvido no MySQL. O gatilho está em `database/migrations/2018_07_19_023451_create_triggers.php`, caso haja necessidade de exclusão/modificação.

Antes de rodar o script do banco, deve-se criar um banco de dados chamado 'biblioteca'. Foi utilizado como
o usuário *root* e sem senha, porém isso pode ser alterado pelo arquivo <u>.env</u>, presente na pasta raiz do projeto.

Após criar o banco no SGBD, deve-se criar e popular as tabelas a partir do seguinte código:
```
php artisan migrate:refresh --seed
```  

## Rotas

Todas as rotas estão disponíveis em  `routes/api.php`, além de poderem ser vistas nos testes.

Para cada uma das 7 entidades:

- usuarios
- perfis
- idiomas
- generos
- autores
- livros
- emprestimos

As rotas definidas são:

```
GET /api/nome_da_entidade/
GET /api/nome_da_entidade/id
POST /api/nome_da_entidade/
PUT /api/nome_da_entidade/edit/id
DELETE /api/nome_da_entidade/delete/id
```

## Estrutura das Requisições

#### Usuario
```
{'matricula': '', 'email': '', 'senha': ''} [inserir/editar/deletar]
```
- 'matrícula' é do tipo string

#### Perfil
```
{'nome': '', 'cpf': '', 'usuario': ''} [inserir/editar]
```
- 'usuario' é a matrícula;
- Cpf sem pontos ou espaços;
- Perfil não tem função excluir. Ele é excluído automaticamente quando se exclui o usuário, ou pode ser apenas desativado adicionando o campo `'situação': 'inativo'` na requisição. 


#### Idioma e Genero
```
{'titulo': ''} [inserir]
ou
{'id': '', 'titulo': ''} [editar/deletar]
```
#### Autor
```
{'nome': ''} [inserir]
ou
{'id': '', 'nome': ''} [editar/deletar]
```

#### Livro
```
{
'cod': '',  'codgeral': '', 'titulo': '', 'paginas': '', 'edicao': '', 'ano': '', 'idioma': '',
'generos': [{'id': '', 'nome': ''}, {'id': '', 'nome': ''}, ...],
'autores': [{'id': '', 'nome': '', 'ordem: ''}, ... ]}
}
[inserir/editar/deletar]
```
- 'cod' e 'codgeral' são as chaves primárias, do tipo string (pode ser o mesmo código para os dois campos);
- um livro tem 1:N gêneros, e tem 1:N autores;
- 'ordem' é a ordem (integer) que os autores devem aparecer (1º autor, 2º autor, etc).

#### Emprestimo
```
{'usuario': '', 'livro': ''} [inserir]
ou
{'id': '', 'usuario': '', 'livro': ''} [editar/deletar]
```
- 'livro' é o código (cod) do livro
- o campo 'dataEmprestimo' é automaticamente preenchido;
- o campo 'dataDevolucao' (dateTime) deve ser incluído na requisição, no momento da devolução;
- o campo 'prazo' é automaticamente preenchido (15 dias);

O empréstimo não será permitido nos seguintes casos:
- o usuário já fez 3 empréstimos (sem devolução);
- o usuário está inativo;
- o livro já está emprestado;



## Testes

Para integração contínua, foi utilizado o <a href="https://travis-ci.org/">Travis CI</a> devido à sua facilidade de uso tendo em vista sua integração automática com o GitHub. No log do TravisCI, é possível verificar a cobertura de testes; 

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
