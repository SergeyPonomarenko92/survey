<?php

//to check incoming parameters for expected field names and remove unexpected
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
            $errors = "The field {$key} is required";
        }
    }
    if (!empty($errors)) {
        return true;
    }
    return $errors;
}


function h($string):string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function old(string $name, $request):string
{

    return isset($load_data[$name]) ? h($request[$name]) : '';
}