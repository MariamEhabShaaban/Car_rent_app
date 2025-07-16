<?php
use Models\Booking_requests_model;
use Models\Cars_model;
use Core\App;
$db=App::container()->resolve(\Core\Database::class);
$car = new Cars_model($db);


$request = new Booking_requests_model($db);

// get all cars
$cars = $request->available_cars($_SESSION['id']);


require view('home.view.php', [

    'cars' => $cars

]);


