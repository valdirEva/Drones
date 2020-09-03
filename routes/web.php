<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('drones',  ['uses' => 'DroneController@showAllDrones']);

  $router->get('drones/{id}', ['uses' => 'DroneController@showOneDrone']);
  
  $router->post('drones', ['uses' => 'DroneController@create']);

  $router->delete('drones/{id}', ['uses' => 'DroneController@delete']);

  $router->put('drones/put/{id}', ['uses' => 'DroneController@update']);
  
  
});

$router->group(['prefix' => 'api2'], function () use ($router) {
   
  $router->get('drones/paginate', ['uses' => 'DroneController@paginate']);
  
  $router->get('drones/sort', ['uses' => 'DroneController@sort']);
  
  $router->get('drones/filter', ['uses' => 'DroneController@filter']);
  
  
});