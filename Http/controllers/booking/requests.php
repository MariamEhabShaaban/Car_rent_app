<?php

use Models\Booking_requests_model;
use Core\App;
$request = new Booking_requests_model(App::container()->resolve(\Core\Database::class));
$cars =$request->rented_cars();
require view('requests/requests.view.php',[
    'cars'=>$cars
]);