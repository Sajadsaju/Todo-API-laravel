<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Add the following code to enable CORS
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/hellow','Controller@hellow');
$router->post('/createTask','UserController@createTask');
$router->post('/updateTask/{id}','UserController@UpdateTask');
$router->post('/delete/{id}','UserController@DeleteTask');
$router->get('/view','UserController@view');


