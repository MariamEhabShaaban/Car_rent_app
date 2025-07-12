<?php
use Models\Cars_model;

$car =new Cars_model();



$cars = $car->get_all_cars();




    require view("cars/manage.view.php",[
        'cars'=>$cars
    ]);
    exit;

