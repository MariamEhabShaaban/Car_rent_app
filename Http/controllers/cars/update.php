<?php

use Core\App;
use Core\validator;

$db=App::container()->resolve(\Core\Database::class);

$_SESSION['update']="Failed To Update";

$id= $_POST['id'];

$car= $_POST['car'];

$price= $_POST['price'];

if(validator::string($car,1) && validator::string($price,2)){

$status= 'Available';

$store_car = $db->query('UPDATE cars SET model_name = ?, price = ?, `status` = ? WHERE id = ?
',[$car, $price ,$status,$id]);

if($store_car){
    $_SESSION['update']="Updated Successfully";
   
}
}

 header('location:/manage');




