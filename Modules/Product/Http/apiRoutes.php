<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/product'], function (Router $router) {
    $router->get('/products', [
        'as' => 'api.product.products.index',
        'uses' => 'ProductController@index',
    ]);
    $router->post('products', [
        'as' => 'api.product.products.store',
        'uses' => 'ProductController@store',
    ]);
});
