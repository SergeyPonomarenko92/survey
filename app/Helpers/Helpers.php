<?php


function load(array $fillable, $post = true )
{
    $load_data = $post ? $_POST : $_GET;
    $data = [];

    foreach ($fillable as $value) {
        if (isset($load_data[$value])) {
            $data[$value] = trim($load_data[$value]);
        }else{
            $data[$value] = '';
        }
    }
    return $data;
}
