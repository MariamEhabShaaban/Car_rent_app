<?php

// validate date empty and in the future
use Core\validator;
use Models\Booking_requests_model;
$request = new Booking_requests_model;

;

$errors=[];


$time = $_POST['date'];




if (validator::string($time, 6) && validate_date($time)) {

        $Id = $_SESSION['booking_id'];

       

// update in database

        $store_date = $request->set_date( $time,$Id);
    }

else{
    $errors['date']='Please Enter a valid date';
    require view('uploads/time.view.php',[
        'errors'=> $errors
    ]);
    exit;
}

redirect("/payment_method");







