<?php

use Core\validator;


$errors=[];
$register=true;

$email = $_POST['email'];

$password =password_hash($_POST['password'],PASSWORD_DEFAULT);

$confirm_pass= $_POST['confirm_password'];
// form validation 

if(!validator::string($email)){

     $errors['email']='Please This Field is required';
}
else{

    if(!validator::string($password,8)){

    $errors['password']='Password must be more than 7 characters';

    } else {
        // valid & unique email 

        if(validator::email($email) && unique($email)){


            

    // password confirm

    if(!password_verify($password,$confirm_pass) && empty($errors)){

        $errors['password']='Not match password';

    }
    else{

        // register successfully
          $register = Register($email, $password);
       

    }

}
    
else{

    $errors['email']='Enter valid Email';

}


    }
}



// email validation




if(!empty($errors)){

    require view('signup.view.php',[

        'errors' => $errors

    ]);

    exit;
}


if(!$register){

 $_SESSION['register']='Failed To Register'; 

}

header('location:/login');












// store in database



// redirect to login page if register success


// if not return to sign up with errors