<?php

use Models\Cars_model;

$cars= new Cars_model;

$token= $_POST['token']??$_GET['token'];


$car = $cars->get_car($token);

$id = $car['id'];
if($car){
    $car['image']= image($car['id'],$car['image_ext']);
  

    require view("cars/info.view.php",[
        'car'=>$car
    ]);
    exit;
}

redirect("/control_panel");

