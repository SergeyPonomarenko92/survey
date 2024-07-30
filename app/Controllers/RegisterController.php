<?php

namespace App\Controllers;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Generator\UrlGenerator;

use App\Helpers\Helpers;

class RegisterController
{
    public function index(RouteCollection $routes, ?Request $request): void
    {

        $requestContext = new RequestContext();
        $requestContext = $requestContext->fromRequest($request);
        $title = "Register page";
        $UrlGenerator = new UrlGenerator($routes,$requestContext);
        $UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL);



        dump($UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL));


        require_once APP_ROOT . '/public/views/register-form.php';
    }
}


