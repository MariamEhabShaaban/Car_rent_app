<?php

use Core\Authenticator;
use Core\App;


$errors = [];
$register = true;

$email = $_POST['email'];

$password = $_POST['password'];

$confirm_pass = $_POST['confirm_password'];

$auth = new Authenticator(App::container()->resolve(\Core\Database::class));

$auth->validate($email, $password);

$auth->confirm_password($confirm_pass);

$errors = $auth->error();


if (!empty($errors)) {

    require view('signup.view.php', [

        'errors' => $errors

    ]);

    exit;
}

$register = $auth->register();

if (!$register) {

    $_SESSION['register'] = 'Failed To Register';

}

redirect('/login');
