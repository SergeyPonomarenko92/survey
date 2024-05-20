<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use App\Services\SurveyService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	public function index(RouteCollection $routes, ?Request $request): void
	{
        var_dump('test');
        die;
        $user = User::getCurrentUser();

        require_once APP_ROOT . '/views/home.php';
	}



}
