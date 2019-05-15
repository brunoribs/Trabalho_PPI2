<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include_once('CarroController.php');
include_once('UsuarioController.php');
require './vendor/autoload.php';

$app = new \Slim\App;
	
$app->group('/carros', function() use ($app) {
    $app->get('','CarroController:listar');
    $app->post('','CarroController:inserir');

    $app->get('/{id}','CarroController:buscarPorId');    
    $app->put('/{id}','CarroController:atualizar');
    $app->delete('/{id}', 'CarroController:deletar');
})->add('UsuarioController:validarToken');

$app->post('/usuarios','UsuarioController:inserir');

$app->post('/auth','UsuarioController:autenticar');

$app->run();
?>