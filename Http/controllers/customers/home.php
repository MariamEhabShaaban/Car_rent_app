<?php
use Models\Booking_requests_model;
use Models\Cars_model;
$car = new Cars_model;

$request = new Booking_requests_model;

// get all cars
$cars = $request->available_cars();


require view('home.view.php', [

    'cars' => $cars

]);


