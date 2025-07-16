<?php

use Models\Booking_requests_model;
use Models\Cars_model;
use Core\validator;
use Core\App;
$db=App::container()->resolve(\Core\Database::class);
$request = new Booking_requests_model($db);
$car = new Cars_model($db);


$errors = [];


$token = '';
$car_token = $_POST['token'];

$id_front = $_FILES['id_front']['name'];

$id_back = $_FILES['id_back']['name'];

$tmp_name_front = $_FILES['id_front']['tmp_name'];

$tmp_name_back = $_FILES['id_back']['tmp_name'];

$uploadDir = 'customers/id';


if (validator::string($id_front, 1) && validator::string($id_back, 1)) {

    $status = 'pending';
    $customer_id = $_SESSION['id'];
    $car_id = $car->get_car($car_token)['id'];
    $store_req = $request->add_request($customer_id,$car_id,$status);
    if ($store_req) {
        $Id=$_SESSION['booking_id']= $store_req['id'];
        $token = $store_req['token'];


        $ext_front = extension($id_front);

        upload_image($id_front, $tmp_name_front, $Id, $uploadDir . '/front');

        $ext_back = extension($id_back);

        upload_image($id_back, $tmp_name_back, $Id, $uploadDir . '/back');

        $store_id = $request->upload_id( $ext_front,$ext_back,$Id);

    }
} else {
    $errors['id_uploads'] = 'Please upload the front and back';
    require view('uploads/id.view.php', [
        'errors' => $errors
    ]);
    exit;
}

redirect("/upload_passport?token=$token");




