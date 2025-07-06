<?php

use Core\App;
use Core\validator;

$db=App::container()->resolve(\Core\Database::class);

$_SESSION['add']="Failed To Add";

$car= $_POST['car'];

$price= $_POST['price'];

if(validator::string($car,1) && validator::string($price,2)){

$status= 'Available';

$store_car = $db->query('INSERT INTO cars (`model_name`,`price`,`status`) VALUES (?,?,?)',[$car, $price ,$status]);

if($store_car){
    $_SESSION['add']="Added Successfully";
   
}
}

 header('location:/manage');




