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
    $router->post('races', 'RacesController@store');

    $router->get('races/{id}/edit', 'RacesController@edit');
    $router->put('races/{id}', 'RacesController@update');



    $router->get('/', 'HomeController@index');

});
