<?php

use Core\App;
use Core\validator;
use Models\Cars_model;

$update_car =new Cars_model();

$db=App::container()->resolve(\Core\Database::class);

$_SESSION['update']="Failed To Update";

$id= $_POST['id'];

$car= $_POST['car'];

$price= $_POST['price'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$uploadDir = 'cars';
if(validator::string($car,1) && validator::string($price,2)){

$status= 'Available';

$store_car = $update_car->update_car($car, $price ,$status,$id);
 if ($store_car) {
      if(!empty($image)){
        $carId = $id;
        $ext = extension($image);
        upload_image($image, $tmp_name, $carId, $uploadDir);
        $store_car = $update_car->store_image ($ext, $carId);
        }

        $_SESSION['update'] = "Updated Successfully";

    }
}

 redirect('/manage');




