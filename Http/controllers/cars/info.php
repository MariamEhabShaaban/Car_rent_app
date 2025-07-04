<?php

use Core\App;

$db=App::container()->resolve(\Core\Database::class);

$id= $_POST['car'];

$car = $db->query('SELECT * FROM cars WHERE id= ?',[$id])->find();


if($car){

    require view("cars/info.view.php",[
        'car'=>$car
    ]);
    exit;
}

header("location:/control_panel");

