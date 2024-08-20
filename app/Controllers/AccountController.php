<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use App\Models\UserModel;
use App\Services\SurveyService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class AccountController
{
    public function index(RouteCollection $routes, ?Request $request): void
    {
        $title = "My account";
        $form_title = "My votes ";

        include_once APP_ROOT . '/public/views/my-account.php';

    }


    public function create(){
        $title = "New Vote";
        $form_title = "Create new Vote";
        $data = ['name','email','password'];
        $request_data = $request->request->all();

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


        include_once APP_ROOT . '/public/views/register-form.php';
    }


    public function edit(string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

}
