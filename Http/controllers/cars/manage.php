<?php
use Models\Cars_model;

$car =new Cars_model();



$cars = $car->get_all_cars();


$availableCars = array_filter($cars, fn($car) => $car['status'] === 'Available');
$unavailableCars = array_filter($cars, fn($car) => $car['status'] === 'Not_available');

    require view("cars/manage.view.php",[
        'availableCars'=>$availableCars,
        'unavailableCars'=>$unavailableCars
    ]);
    exit;

