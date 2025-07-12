<?php
session_start();
use Core\App;
use Core\validator;

$db = App::container()->resolve(\Core\Database::class);

$errors=[];



$car_id = $_POST['id'];

$passport = $_FILES['passport']['name'];



$tmp_name_pass = $_FILES['passport']['tmp_name'];

$uploadDir = 'customers/passport';


if (validator::string($passport, 1)) {

        $Id = $_SESSION['booking_id'];

        $ext_pass = extension($passport);

        upload_image($passport, $tmp_name_pass, $Id, $uploadDir);

        $store_pass = $db->query('UPDATE booking_requests SET passport =? WHERE id= ?', [$ext_pass,
         $Id]);

    }

else{
    $errors['id_uploads']='Please upload the passport';
    require view('uploads/passport.view.php',[
        'errors'=> $errors
    ]);
    exit;
}

redirect("/upload_license?car=$car_id");




