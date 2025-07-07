<?php

use Core\Response;
use Core\Router;
  use Core\App;
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


function Register($email,$password){
  
$db=App::container()->resolve(\Core\Database::class); 
    session_start();

   $register = $db->query('INSERT INTO users (`email` , `password`, `role`) VALUES (?,?,?) ',[ $email , $password,'customer' ]);
    $_SESSION['register']='Registed Successfully'; 
    return $register;
}


function unique ($email){
    $db=App::container()->resolve(\Core\Database::class); 
    $duplicate = $db->query('SELECT * FROM users WHERE email = ?',[$email])->find();
    $_SESSION['register']='Registed Successfully'; 
    return !$duplicate;
}