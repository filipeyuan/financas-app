<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function ($routes) {
    $routes->get('categorias', 'CategoriaController::index'); // Listar categorias
    $routes->post('categorias', 'CategoriaController::create'); // Criar categoria
    
    $routes->get('transacoes', 'TransacaoController::index'); // Listar transações
    $routes->post('transacoes', 'TransacaoController::create'); // Criar transação
    $routes->put('transacoes/(:num)', 'TransacaoController::update/$1'); // Atualizar transação
    $routes->delete('transacoes/(:num)', 'TransacaoController::delete/$1'); // Excluir transação
});