<?php

use Core\Response;
use Core\Router;
use Core\App;
//define ('BASE_PATH',' https://a58a472d6fec.ngrok-free.app');
function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function uriIs($uri)
{
    return $uri == $_SERVER['REQUEST_URI'];
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}


function base_path($path)
{


    $PATH = BASE_PATH . $path;

    return $PATH;
}


function view($path, $attr = [])
{
    extract($attr);
    return base_path('views/' . $path);
}


function abort($code = 404)
{
    http_response_code($code);
    require base_path("Http/controllers/{$code}.php");
    die();
}


function redirect($path)
{

    header('location:' . $path);

    exit;

}

function upload_image($image, $tmp_name, $carId, $uploadDir)
{


    $image_name = $image;
    $ext = extension($image_name);

    $image_name = $carId . '.' . $ext;

    $source_path = $tmp_name;

    $dest_path = base_path('public/uploads/' . $uploadDir . '/' . $image_name);


    $upload = move_uploaded_file($source_path, $dest_path);

    return $upload;


}

function explodeImage($image_name)
{
    $explode_img = explode('.', $image_name);
    return $explode_img;
}

function extension($image_name)
{

    $ext = explodeImage($image_name)[1];
    return $ext;
}

function image($id, $ext)
{
    $image = $id . '.' . $ext;
    return $image;
}


function remove_image($id, $ext, $removeDir)
{
    $image_name = $id . '.' . $ext;
    $path = base_path('public/uploads/' . $removeDir . '/' . $image_name);
    $remove = unlink($path);
    return $remove;
}


function validate_date($date) {
 
   $input_date = new DateTime($date);
   $input_date = $input_date->format('Y-m-d'); 
    $current_date = date('Y-m-d');

    return $input_date > $current_date;
}

function check_expire($time){
    return $time <time();
}

