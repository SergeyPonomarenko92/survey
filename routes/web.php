<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', ['controller' => 'PageController', 'method'=>'index'], []));
$routes->add('register-page', new Route(constant('URL_SUBFOLDER') . '/register', ['controller' => 'RegisterController', 'method'=>'index'], []));
