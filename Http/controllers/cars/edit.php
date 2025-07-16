<?php

use Models\Cars_model;
$car_ =new Cars_model;



$token= $_GET['token'];

$car = $car_->get_car($token);

if(!empty($car)){
    
    require view('cars/edit.view.php',
[
    "car"=>$car
]);
exit;
}

