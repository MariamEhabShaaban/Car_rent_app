<?php

use Models\Booking_requests_model;
$request = new Booking_requests_model;
$cars =$request->rented_cars();
require view('requests/requests.view.php',[
    'cars'=>$cars
]);