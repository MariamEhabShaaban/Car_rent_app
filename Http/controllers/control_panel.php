<?php
// bring all cars

use Core\App;

$db=App::container()->resolve(\Core\Database::class);

$cars = $db->query('SELECT * FROM cars')->getAll();


 require view("control_panel.view.php",[
    'cars'=>$cars
 ]);