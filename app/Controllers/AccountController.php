<?php

namespace App\Controllers;

use App\Models\UserModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class AccountController
{
    public function index(RouteCollection $routes, ?Request $request): void
    {
        $title = "My account";
        $form_title = "My votes ";

        include_once APP_ROOT . '/public/views/my-account.php';

    }


    public function create_vote( RouteCollection $routes, ?Request $request){
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


        include_once APP_ROOT . '/public/views/forms/create-new-vote.php';
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
