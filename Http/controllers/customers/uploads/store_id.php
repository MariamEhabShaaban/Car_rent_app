<?php

use Core\App;
use Core\validator;

$db = App::container()->resolve(\Core\Database::class);

$errors = [];



$car_id = $_POST['id'];

$id_front = $_FILES['id_front']['name'];

$id_back = $_FILES['id_back']['name'];

$tmp_name_front = $_FILES['id_front']['tmp_name'];

$tmp_name_back = $_FILES['id_back']['tmp_name'];

$uploadDir = 'customers/id';


if (validator::string($id_front, 1) && validator::string($id_back, 1)) {

    $status = 'pending';
    $customer_id = $_SESSION['id'];
    $store_id = $db->query('INSERT INTO booking_requests (`customer_id`,`car_id`) VALUES (?,?)', [$customer_id, $car_id]);

    if ($store_id) {
        $Id=$_SESSION['booking_id']= $db->lastInsertId();

        $ext_front = extension($id_front);

        upload_image($id_front, $tmp_name_front, $Id, $uploadDir . '/front');

        $ext_back = extension($id_back);

        upload_image($id_back, $tmp_name_back, $Id, $uploadDir . '/back');

        $store_id = $db->query('UPDATE booking_requests SET id_front =?, id_back=? WHERE id= ?', [
            $ext_front,
            $ext_back,
            $Id
        ]);

    }
} else {
    $errors['id_uploads'] = 'Please upload the front and back';
    require view('uploads/id.view.php', [
        'errors' => $errors
    ]);
    exit;
}

redirect("/upload_passport?car=$car_id");




