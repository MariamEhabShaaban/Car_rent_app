<?php

use Core\App;
use Core\Mail;
use Models\Booking_requests_model;

$book_request = new Booking_requests_model(App::container()->resolve(\Core\Database::class));
$errors = [];
$mail = new Mail();
$token =$_GET['token'];

$request = $book_request->get_request($token);


ob_start();
 require view('email/email.view.php', ['request' => $request]);

$body = ob_get_clean();


$email = $mail->sendEmail($body);

if ($email) {
    redirect('/home');
}

$errors['send_email'] = 'Please submit again';

view('payment.view.php', [
    'errors' => $errors
]);

