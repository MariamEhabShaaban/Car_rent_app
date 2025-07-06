<?php


use Core\App;

$db=App::container()->resolve(\Core\Database::class);

$id= $_GET['car'];

$car = $db->query('SELECT * FROM cars WHERE id= ?',[$id])->find();

if(!empty($car)){
    
    require view('cars/edit.view.php',
[
    "car"=>$car
]);
exit;
}

