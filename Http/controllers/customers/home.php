<?php

use Core\App;

$db = App::container()->resolve(\Core\Database::class);

// get all cars
$cars = $db->query('SELECT * FROM cars')->getAll();

require view('home.view.php', [

    'cars' => $cars

]);


