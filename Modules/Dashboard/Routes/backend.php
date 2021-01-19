<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {
    $router->get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard.index'
    ]);

    Route::resource('users', UserController::class)->except(['show'])->names([
        'index' => 'dashboard.users.index',
        'create' => 'dashboard.users.create',
        'store' => 'dashboard.users.store',
        'edit' => 'dashboard.users.edit',
        'update' => 'dashboard.users.update',
        'destroy' => 'dashboard.users.delete',
    ]);
});
