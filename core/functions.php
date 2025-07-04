<?php

use Core\Response;
use Core\Router;
function dd($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function uriIs($uri){
    return $uri==$_SERVER['REQUEST_URI'];
}

function authorize($condition,$status=Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}


function base_path($path){
    
    $PATH= BASE_PATH.$path;

    return $PATH;
}


function view ($path,$attr=[]){
    extract($attr);
    return base_path('views/'.$path);
}


function abort($code=404){
    http_response_code($code);
    require base_path("controllers/{$code}.php");
    die();
}

function login($email,$role){
     $_SESSION['user']=[
        'email'=>$email
    ];
    $_SESSION['role']=$role;
    session_regenerate_id(true);
}

function logout(){
    $_SESSION=[];
    session_destroy();
    $params=session_get_cookie_params();
    setcookie("PHPSESSID","",time()-3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}