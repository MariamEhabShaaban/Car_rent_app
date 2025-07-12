<?php

// validate date empty and in the future



session_start();
use Core\App;
use Core\validator;

$db = App::container()->resolve(\Core\Database::class);

$errors=[];


$time = $_POST['date'];




if (validator::string($time, 6) && validate_date($time)) {

        $Id = $_SESSION['booking_id'];

       

// update in database

        $store_date = $db->query('UPDATE booking_requests SET date =? WHERE id= ?', [$time,
         $Id]);

    }

else{
    $errors['date']='Please Enter a valid date';
    require view('uploads/time.view.php',[
        'errors'=> $errors
    ]);
    exit;
}

redirect("/payment_method");







// send an email to owner to confirm and this link will deleted after 5 hours