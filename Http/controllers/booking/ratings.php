<?php
use Core\App;
use Models\Rating_model;
$rate = new Rating_model(App::container()->resolve(\Core\Database::class));
$ratings = $rate->average_rate();


require view(
    'ratings.view.php',
    ['rating' => $ratings]
);