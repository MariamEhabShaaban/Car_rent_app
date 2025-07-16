<?php

use Models\Rating_model;
$rate = new Rating_model;
$ratings = $rate->avarage_rate();


require view(
    'ratings.view.php',
    ['rating' => $ratings]
);