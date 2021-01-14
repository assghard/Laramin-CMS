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

$router->get('{uri}', [ // subpage
    'uses' => 'PublicController@subpage',
    'as' => 'page.subpage',
])->where('uri', '.*');


/*
|--------------------------------------------------------------------------
| Backend routes
|--------------------------------------------------------------------------
*/

// $router->group(['prefix' => '/system-backend', 'middleware' => ['auth', 'verified', 'admin']], function (Router $router) {

// });