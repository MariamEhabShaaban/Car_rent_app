<?php
// bring all cars
use Core\App;
use Models\Cars_model;
use Models\Booking_requests_model;
$db= App::container()->resolve(\Core\Database::class);
$car = new Cars_model($db);
$request= new Booking_requests_model($db);

$cars = $car->get_all_cars();
$pending = $request->get_pending();

if($pending){
   $pending =$pending['count'];
}


 require view("control_panel.view.php",[
    'cars'=>$cars,
    'pending'=>$pending
 ]);