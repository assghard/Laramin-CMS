<?php

use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Frontend routes
|--------------------------------------------------------------------------
*/
$router->get('/', [
    'uses' => 'PublicController@homepage',
    'as' => 'page.homepage'
]);

$router->group(['prefix' => 'contact'], function (Router $router) {
    $router->get('/', [ // contact page
        'uses' => 'PublicController@contact',
        'as' => 'page.contact',
    ]);
    $router->post('/send-contact', [
        'uses' => 'PublicController@sendContact',
        'as' => 'page.send-contact',
    ]);
});

$router->get('{uri}', [ // subpage
    'uses' => 'PublicController@subpage',
    'as' => 'page.subpage',
])->where('uri', '.*');


/*
|--------------------------------------------------------------------------
| Backend routes
|--------------------------------------------------------------------------
*/

// $router->group(['prefix' => env('BACKEND_URI'), 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {

// });