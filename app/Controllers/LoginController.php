<?php

namespace App\Controllers;


use App\Models\UserModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Generator\UrlGenerator;


class LoginController
{
    public function index(RouteCollection $routes, ?Request $request): void
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
                    redirect('vote-page');
                }
                $_SESSION['success'] = 'registered';


            }else{
                $_SESSION['errors'] = print_alerts($validated);
            }

        }

        UserModel::register($data);


        // dump($UrlGenerator->generate('register-page', [], UrlGenerator::ABSOLUTE_URL));   ['parameters']


        include_once APP_ROOT . '/public/views/login-form.php';
    }
}


