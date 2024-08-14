<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use App\Services\SurveyService;
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


    public function create(){

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
