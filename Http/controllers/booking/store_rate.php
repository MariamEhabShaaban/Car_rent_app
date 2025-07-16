<?php
use Core\App;
use Models\Rating_model;
use Core\validator;
use Models\Booking_requests_model;
$db = App::container()->resolve(\Core\Database::class);
$rate = new Rating_model($db);
$availability = $_POST['availability'];
$credibility = $_POST['credibility'];
$attitude = $_POST['attitude'];
$book_token = $_POST['token'];

if (validator::string($attitude, 1) && validator::string($availability, 1) && validator::string($credibility, 1)) {

    $add_rate = $rate->add_rate($availability, $credibility, $attitude);
    $book = new Booking_requests_model($db);


    $request = $book->delete($book_token);
    if ($add_rate && $request) {
        // remove booking request
        $_SESSION['rating'] = 'Thanks For Rating';
        redirect('/rent_request');

    }
    abort('404');
} else {
    $errors['rating'] = 'Please rate all';
    require view('requests/rate.view.php', [
        'errors' => $errors
    ]);
}


