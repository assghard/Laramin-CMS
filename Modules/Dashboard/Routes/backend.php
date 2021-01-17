<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {
    $router->get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard.index'
    ]);
});
