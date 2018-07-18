<?php
//Autoload
$loader = require 'vendor/autoload.php';

//Instanciando objeto
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

$app->get('/organizador/', function() use ($app){
    (new \controllers\Organizador($app))->lista();
});

$app->get('/organizador/:id', function($id) use ($app){
    (new \controllers\Organizador($app))->get($id);
});

//novo organizador
$app->post('/usuario/', function() use ($app){
    (new \controllers\Login($app))->novoUsuario();
});

//listar usuarios
$app->get('/usuario/lista', function() use ($app){
    (new \controllers\Login($app))->lista();
});

//edita organizador
//$app->put('/organizador/:id', function($id) use ($app){
//    (new \controllers\Organizador($app))->editar($id);
//});
$app->post('/organizador/edit/:id', function($id) use ($app){
    (new \controllers\Organizador($app))->editar($id);
});

//apaga organizador
//$app->delete('/organizador/:id', function($id) use ($app){
//    (new \controllers\Organizador($app))->excluir($id);
//});
$app->get('/organizador/delete/:id', function($id) use ($app){
    (new \controllers\Organizador($app))->excluir($id);
});


//loginAuth
$app->post('/organizador/loginAuth/', function() use ($app){
    (new \controllers\Organizador($app))->authUser();
});

//forgot password
$app->get('/organizador/forgotPassword/', function() use ($app){
    (new \controllers\Organizador($app))->sendEmail();
});


//Listando evento
$app->get('/evento/', function() use ($app){
    (new \controllers\Evento($app))->lista();
});

//Listando eventos by usuario
$app->get('/evento/listByUser/:id', function($id) use ($app){
    (new \controllers\Evento($app))->listaByUser($id);
});

//get evento
$app->get('/evento/:id', function($id) use ($app){
    (new \controllers\Evento($app))->get($id);
});

//nova evento
$app->post('/evento/', function() use ($app){
    (new \controllers\Evento($app))->novo();
});

//edita evento
//$app->put('/evento/:id', function($id) use ($app){
//    (new \controllers\Evento($app))->editar($id);
//});
$app->post('/evento/edit/:id', function($id) use ($app){
    (new \controllers\Evento($app))->editar($id);
});

//apaga evento
//$app->delete('/evento/:id', function($id) use ($app){
//    (new \controllers\Evento($app))->excluir($id);
//});
$app->get('/evento/delete/:id', function($id) use ($app){
    (new \controllers\Evento($app))->excluir($id);
});

//Rodando aplicação
$app->run();