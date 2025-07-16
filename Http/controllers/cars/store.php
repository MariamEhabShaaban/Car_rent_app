<?php


use Core\validator;
use Models\Cars_model;
$add_car= new Cars_model();



$_SESSION['add'] = "Failed To Add";

$car = $_POST['car'];

$price = $_POST['price'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$uploadDir = 'cars';


if (validator::string($car, 1) && validator::string($price, 2)) {

    $status = 'Available';

    $store_car = $add_car->add_car($car,$price,$status);

    if ($store_car) {
        $carId = $store_car;
        $ext = extension($image);
        upload_image($image, $tmp_name, $carId, $uploadDir);
        $store_car = $add_car->store_image($ext,$carId);
        if($store_car)
        $_SESSION['add'] = "Added Successfully";

    }
}

redirect('/manage');




