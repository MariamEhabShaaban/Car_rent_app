<?php

session_start();

define('BASE_PATH', str_replace('\\', '/', __DIR__) . '/../');

require BASE_PATH.'Core/functions.php';

spl_autoload_register(function ($class) {
    
    $path = str_replace('\\', '/', $class);
    
    $file = base_path("{$path}.php");

    require $file;
    
});

$router = new \Core\Router();

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];


$router->route($uri,$method);
