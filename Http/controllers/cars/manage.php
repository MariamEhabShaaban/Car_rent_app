<?php

use Core\App;

$db=App::container()->resolve(\Core\Database::class);

$id= $_POST['car'];

$cars = $db->query('SELECT * FROM cars',[])->getAll();


if($cars){

    require view("cars/manage.view.php",[
        'cars'=>$cars
    ]);
    exit;
}

header("location:/control_panel");
