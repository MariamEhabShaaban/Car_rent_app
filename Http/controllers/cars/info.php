<?php

use Models\Cars_model;

$cars= new Cars_model;

$id= $_POST['car']??$_GET['car'];


$car = $cars->get_car($id);


if($car){
    $car['image']= image($car['id'],$car['image_ext']);
  

    require view("cars/info.view.php",[
        'car'=>$car
    ]);
    exit;
}

redirect("/control_panel");

