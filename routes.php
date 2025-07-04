<?php

$router->get('/', 'welcome.php');
$router->get('/control_panel', 'control_panel.php')->only('Owner');

$router->post('/login', 'sessions/login.php');