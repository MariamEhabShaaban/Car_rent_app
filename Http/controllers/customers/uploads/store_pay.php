<?php

// store payment method

use Core\validator;
use Models\Booking_requests_model;
$request = new Booking_requests_model;
$errors = [];


$pay_method = $_POST['payment_method'];

// validate

if (validator::string($pay_method, 8)) {
    // update in data base
    $Id = $_SESSION['booking_id'];

      $store_pay = $request->payment_method($pay_method,$Id);

    if ($store_pay) {
        // go to home 
        redirect('/home');
    }


} else {
    $errors['pay'] = 'Please choose one';
    require view('uploads/payment.view.php', [
        'errors' => $errors
    ]);
    exit;
}

 redirect('/send_email');

// send an email to owner to confirm and this link will deleted after 5 hours


