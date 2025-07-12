<?php
session_start();
use Core\App;
use Core\validator;

$db = App::container()->resolve(\Core\Database::class);

$errors=[];



$car_id = $_POST['id'];

$license = $_FILES['license']['name'];



$tmp_name_license = $_FILES['license']['tmp_name'];

$uploadDir = 'customers/license';


if (validator::string($license, 1)) {
        $Id = $_SESSION['booking_id'];

        $ext_license = extension($license);

        upload_image($license, $tmp_name_license, $Id, $uploadDir);

        $store_license = $db->query('UPDATE booking_requests SET license =? WHERE id= ?', [$ext_license,
         $Id]);

    }

else{
    $errors['id_uploads']='Please upload the License';
    require view('uploads/license.view.php',[
        'errors'=> $errors
    ]);
    exit;
}

redirect("/time?car=$car_id");




