<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {
    $router->get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard.index'
    ]);

    // User routes
    Route::resource('users', UserController::class)->except(['show'])->names([
        'index' => 'dashboard.users.index',
        'create' => 'dashboard.users.create',
        'store' => 'dashboard.users.store',
        'edit' => 'dashboard.users.edit',
        'update' => 'dashboard.users.update',
        'destroy' => 'dashboard.users.delete',
    ]);

    $router->group(['prefix' => '/system-errors'], function (Router $router) {
        $router->get('/', [
            'uses' => 'DashboardController@systemErrorsIndex',
            'as' => 'dashboard.system-errors.index'
        ]);
        $router->delete('/{id}/delete', [
            'uses' => 'DashboardController@systemErrorDelete',
            'as' => 'dashboard.system-errors.delete'
        ]);
        $router->delete('/delete-all', [
            'uses' => 'DashboardController@systemErrorsTruncate',
            'as' => 'dashboard.system-errors.truncate'
        ]);
    });

    // Setting routes
    Route::resource('settings', SettingsController::class)->except(['show'])->names([
        'index' => 'dashboard.settings.index',
        'create' => 'dashboard.settings.create',
        'store' => 'dashboard.settings.store',
        'edit' => 'dashboard.settings.edit',
        'update' => 'dashboard.settings.update',
        'destroy' => 'dashboard.settings.delete',
    ]);
    $router->group(['prefix' => '/settings'], function (Router $router) {
        $router->get('/technical-break/{action}', [
            'uses' => 'SettingsController@technicalBreak',
            'as' => 'dashboard.settings.technical-break'
        ]);
        $router->post('/ip-addresses-update', [
            'uses' => 'SettingsController@ipAddressesUpdate',
            'as' => 'dashboard.settings.ip-addresses-update'
        ]);
    });

    Route::resource('user-submissions', UserSubmissionsController::class)->only(['index', 'destroy'])->names([
        'index' => 'dashboard.user-submissions.index',
        'destroy' => 'dashboard.user-submissions.delete',
    ]);
});
