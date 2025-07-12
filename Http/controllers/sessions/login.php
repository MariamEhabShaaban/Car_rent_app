<?php

//login 
use Core\Authenticator;
use Core\validator;

// validation 

// if email is found and the password is correct
$email = $_POST['email'];

$password = $_POST['password'];

$errors = [];

$auth = new Authenticator();

$login = $auth->attemptLogin($email, $password);

if ($login) {
    $auth->login($email);
}


$errors = $auth->error();



if (!empty($errors)) {

    require view('welcome.view.php', [

        'errors' => $errors

    ]);

    exit;
}


if ($_SESSION['role'] == 'owner') {

    redirect("/control_panel");
    

} else if ($_SESSION['role'] == 'customer') {
   
   
    redirect("/home");


}