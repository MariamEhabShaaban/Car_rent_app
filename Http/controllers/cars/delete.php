<?php

use Models\Cars_model;

$cars =new Cars_model;

$token = $_POST['token'];

$_SESSION['delete'] = 'Failed To Delete';
$car = $cars->get_car($token);
$ext = $car['image_ext'];
$id= $car['id'];
$delete = $cars->delete_car($token);


if ($delete) {

    remove_image($id, $ext, 'cars');

    $_SESSION['delete'] = 'Deleted Successfully';
}
redirect('/manage');
