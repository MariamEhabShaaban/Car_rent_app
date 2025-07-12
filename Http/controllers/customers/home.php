<?php

use Models\Cars_model;
$car = new Cars_model;

// get all cars
$cars = $car->get_all_cars();

require view('home.view.php', [

    'cars' => $cars

]);


