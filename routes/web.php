<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', ['controller' => 'PageController', 'method'=>'index'], []));
$routes->add('register-page', new Route(constant('URL_SUBFOLDER') . '/register', ['controller' => 'UserController', 'method'=>'register'], []));
$routes->add('login-page', new Route(constant('URL_SUBFOLDER') . '/login', ['controller' => 'UserController', 'method'=>'login'], []));
$routes->add('my-account', new Route(constant('URL_SUBFOLDER') . '/account', ['controller' => 'AccountController', 'method'=>'index'], []));
$routes->add('vote-page', new Route(constant('URL_SUBFOLDER') . '/vote-form/{id}', ['controller' => 'AccountController', 'method'=>'detail'], ['id' => '\d+']));
$routes->add('create-vote', new Route(constant('URL_SUBFOLDER') . '/create-vote', ['controller' => 'AccountController', 'method'=>'create'], []));
$routes->add('edite-vote', new Route(constant('URL_SUBFOLDER') . '/edit-vote/{id}', ['controller' => 'AccountController', 'method'=>'edit'], ['id' => '\d+']));
$routes->add('destroy-vote', new Route(constant('URL_SUBFOLDER') . '/destroy-vote/{id}', ['controller' => 'AccountController', 'method'=>'destroy'], ['id' => '\d+']));
