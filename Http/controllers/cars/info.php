<?php

use Core\App;
use Models\Cars_model;

$db = App::container()->resolve(\Core\Database::class);
$cars = new Cars_model($db);

$token = $_POST['token'] ?? $_GET['token'];

$car = $cars->get_car($token);

if ($car) {
    $car['image'] = image($car['id'], $car['image_ext']);

    require view("cars/info.view.php", [
        'car' => $car
    ]);
    exit;
}

redirect("/control_panel");
