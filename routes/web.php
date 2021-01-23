<?php

use Illuminate\Support\Facades\Route;
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

$registerEnabled = system_setting('REGISTER_ROUTES_ENABLED');
if(!empty($registerEnabled) && $registerEnabled == 1){
    Auth::routes(['verify' => true]);
}else{
    Auth::routes(['verify' => true, 'register' => false]);
}
