<?php

use Models\Cars_model;
$car_ =new Cars_model;



$id= $_GET['car'];

$car = $car_->get_car($id);

if(!empty($car)){
    
    require view('cars/edit.view.php',
[
    "car"=>$car
]);
exit;
}

