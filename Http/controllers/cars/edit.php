<?php

use Models\Cars_model;
use Core\App;


$cars =new Cars_model(App::container()->resolve(\Core\Database::class));

$token= $_GET['token'];

$car = $cars->get_car($token);

if(!empty($car)){
    
    require view('cars/edit.view.php',
[
    "car"=>$car
]);
exit;
}

