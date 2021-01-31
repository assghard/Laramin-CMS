<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {
    // Route::resource('media', MediaController::class)->except(['show'])->names([
    //     'index' => 'dashboard.media.index',
    //     'create' => 'dashboard.media.create',
    //     'store' => 'dashboard.media.store',
    //     'edit' => 'dashboard.media.edit',
    //     'update' => 'dashboard.media.update',
    //     'destroy' => 'dashboard.media.delete',
    // ]);
    $router->group(['prefix' => '/media'], function (Router $router) {
        $router->put('/{id}/update-image-box', [
            'uses' => 'MediaController@updateImageBox',
            'as' => 'dashboard.media.update-image-box',
        ]);
    });
});