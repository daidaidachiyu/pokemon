<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    //pokemon管理
    $router->get('races', 'RacesController@index');
    $router->get('races/create', 'RacesController@create');
    $router->get('races/{id}', 'RacesController@show');
    $router->post('races', 'RacesController@store');
    $router->get('races/{id}/edit', 'RacesController@edit');
    $router->put('races/{id}', 'RacesController@update');
    $router->delete('races/{id}', 'RacesController@destroy');

    //道具管理
    $router->get('prors', 'ProrsController@index');
    $router->get('prors/create', 'ProrsController@create');
    $router->get('prors/{id}', 'ProrsController@show');
    $router->post('prors', 'ProrsController@store');
    $router->get('prors/{id}/edit', 'ProrsController@edit');
    $router->put('prors/{id}', 'ProrsController@update');
    $router->delete('prors/{id}', 'ProrsController@destroy');




    $router->get('/', 'HomeController@index');

});
