<?php
use Models\Cars_model;
use Models\Booking_requests_model;
$car = new Cars_model;
$request = new Booking_requests_model;
// update car status to available
$token =$_POST['token'];

$update_car = $car->update_status($token,'Available');
$car_id = $car->get_car($token)['id'];



//update the booking status to returned
if($update_car){
    $token = $request->get_requestByCarId($car_id)['token'];
   
    
     $update_request = $request->update_status($token,'returned');
     if($update_request){
        // redirect manage page
        redirect('/manage');
     }
     abort('404');

}

 abort('404');

