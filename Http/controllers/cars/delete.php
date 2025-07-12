<?php

use Models\Cars_model;

$cars =new Cars_model;

$id = $_POST['car'];

$_SESSION['delete'] = 'Failed To Delete';
$car = $cars->get_car($id);
$ext = $car['image_ext'];

$delete = $cars->delete_car($id);

if ($delete) {

    remove_image($id, $ext, 'cars');

    $_SESSION['delete'] = 'Deleted Successfully';
}
redirect('/manage');
