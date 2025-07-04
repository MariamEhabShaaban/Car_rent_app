<?php

$router->get('/', 'welcome.php');
$router->get('/control_panel', 'control_panel.php')->only('Owner');
$router->get('/cars', 'control_panel.php')->only('Owner');
$router->get('/edit', 'cars/edit.php')->only('Owner');
$router->get('/manage', 'cars/manage.php')->only('Owner');
$router->post('/login', 'sessions/login.php');
$router->post('/logout', 'sessions/logout.php');
$router->post('/info', 'cars/info.php')->only('Owner');
$router->post('/delete', 'cars/delete.php')->only('Owner');