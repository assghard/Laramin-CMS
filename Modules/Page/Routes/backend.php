<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {
    Route::resource('pages', PageController::class)->except(['show'])->names([
        'index' => 'dashboard.pages.index',
        'create' => 'dashboard.pages.create',
        'store' => 'dashboard.pages.store',
        'edit' => 'dashboard.pages.edit',
        'update' => 'dashboard.pages.update',
        'destroy' => 'dashboard.pages.delete',
    ]);
});