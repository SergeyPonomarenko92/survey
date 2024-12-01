<?php

namespace App\Controllers;


use App\Models\UserModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Generator\UrlGenerator;


class UserController
{
    public function register(RouteCollection $routes, ?Request $request): void
    {
        $requestContext = new RequestContext();
        $requestContext = $requestContext->fromRequest($request);
        $title = "Register page";
        $form_title = "Register form";
        $data = ['name','email','password'];
        $request_data = $request->request->all();
        $UrlGenerator = new UrlGenerator($routes, $requestContext);
        $UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL);
        if ($request->getMethod() == 'POST') {
            $filtered_data = load($data, $request_data);
            $validated = check_required_fields($request_data);
            if ($validated === true) {
                if (UserModel::register($request_data)) {
                    redirect('register-page');
                }
                $_SESSION['success'] = 'registered';

            }else{
                $_SESSION['errors'] = print_alerts($validated);
            }
        }

        // dump($UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL));   ['parameters']


        include_once APP_ROOT . '/public/views/forms/register-form.php';
    }

    public function login(RouteCollection $routes, ?Request $request): void
    {
        $requestContext = new RequestContext();
        $requestContext = $requestContext->fromRequest($request);
        $title = "Login page";
        $form_title = "Login form";
        $data = ['email','password'];
        $request_data = $request->request->all();
        $UrlGenerator = new UrlGenerator($routes, $requestContext);
        $UrlGenerator->generate('login-page', [], UrlGenerator::ABSOLUTE_URL);

        if ($request->getMethod() == 'POST') {
            $filtered_data = load($data, $request_data);
            $validated = check_required_fields($request_data);
            if ($validated === true) {
                if (UserModel::login($request_data)) {
                    redirect('account');
                }
                $_SESSION['success'] = 'you are logged';

            }else{
                $_SESSION['errors'] = print_alerts($validated);
            }

        }



        // dump($UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL));   ['parameters']


        include_once APP_ROOT . '/public/views/forms/login-form.php';
    }
}


