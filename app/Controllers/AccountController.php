<?php

namespace App\Controllers;

use App\Models\UserModel;
use Symfony\Component\HttpFoundation\Request;
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

    public function create_vote( RouteCollection $routes, ?Request $request){
        $title = "New Vote";
        $form_title = "Create new Vote";
        $request_data = $request->request->all();

        include_once APP_ROOT . '/public/views/forms/create-new-vote.php';
    }


    public function store_vote( RouteCollection $routes, ?Request $request)
    {
        $request_data = $request->request->all();


        
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
