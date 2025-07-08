<?php

use Core\App;
use Core\validator;

$db = App::container()->resolve(\Core\Database::class);

$_SESSION['add'] = "Failed To Add";

$car = $_POST['car'];

$price = $_POST['price'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$uploadDir = 'cars';


if (validator::string($car, 1) && validator::string($price, 2)) {

    $status = 'Available';

    $store_car = $db->query('INSERT INTO cars (`model_name`,`price`,`status`) VALUES (?,?,?)', [$car, $price, $status]);

    if ($store_car) {
        $carId = $db->lastInsertId();
        $ext = extension($image);
        upload_image($image, $tmp_name, $carId, $uploadDir);
        $store_car = $db->query('UPDATE cars SET image_ext =? WHERE id= ?', [$ext, $carId]);

        $_SESSION['add'] = "Added Successfully";

    }
}

redirect('/manage');




