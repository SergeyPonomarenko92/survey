<?php

use \Symfony\Component\HttpFoundation\Request;

function load(array $fillable, $request )
{
    $data = [];
    foreach ($fillable as $value) {
        if (isset($request[$value])) {
            $data[$value] = trim($request[$value]);
        }else{
            $data[$value] = '';
        }
    }
    return $data;
}

function check_required_fields(array $data ):true|array
{
    $errors = [];
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $errors[] = "The field {$key} is required";
        }
    }
    if (!$errors) {
        return true;
    }

    return $errors;
}

function h($string):string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function print_alerts( $errors ):string
{

    $html = '<ul class="list-unstyled">';
    foreach ($errors as $error) {

        $html .=  "<li> $error  </li>";
    }
    $html .= '</ul>';
    return $html;
}

function get_alerts()
{
    if (!empty($_SESSION['errors'])) {
        include APP_ROOT . '/public/views/alert-error.php';
        unset($_SESSION['errors']);
    }
    if (!empty($_SESSION['success'])) {
        include APP_ROOT . '/public/views/alert-success.php';
        unset($_SESSION['success']);
    }

}

function redirect(string $url)
{
    header("Location: {$url}");
    die;
}

function is_auth():bool
{

    return isset($_SESSION['ID']);
}
