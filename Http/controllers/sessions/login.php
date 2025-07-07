<?php

use Core\App;

use Core\validator;

$db = App::container()->resolve(\Core\Database::class);
// validation 

// if email is found and the password is correct
$email = $_POST['email'];

$password = $_POST['password'];

$errors = [];

// empty validation

if (!validator::string($email)) {

    $errors['email'] = 'Please This Field is required';

} else {

    if (!validator::string($password, 8)) {

        $errors['password'] = 'Password must be more than 7 characters';

    } else {

        $user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();

        if ($user) {

            if (!password_verify($password, $user['password'])) {

                $errors['password'] = 'Incorrect password';
            }

        } else {

            $errors['email'] = 'This email is not found';

        }

    }
}



if (!empty($errors)) {

    require view('welcome.view.php', [

        'errors' => $errors

    ]);

    exit;
}

login($email, $user['role']);

if ($user['role'] == 'owner') {

    header("location:/control_panel");
    exit;
    
}
else if($user['role']=='customer'){
     header("location:/home");
     exit;
}