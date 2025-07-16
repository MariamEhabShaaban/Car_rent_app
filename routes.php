<?php

// owner

$router->get('/', 'welcome.php');
$router->get('/control_panel', 'control_panel.php')->only('Owner');
$router->get('/cars', 'control_panel.php')->only('Owner');
$router->get('/edit', 'cars/edit.php')->only('Owner');
$router->get('/manage', 'cars/manage.php')->only('Owner');
$router->post('/login', 'sessions/login.php');
$router->post('/logout', 'sessions/logout.php');
$router->post('/info', 'cars/info.php')->only('Owner');
$router->delete('/delete', 'cars/delete.php')->only('Owner');
$router->get('/add', 'cars/add.php')->only('Owner');
$router->post('/store', 'cars/store.php')->only('Owner');
$router->put('/update', 'cars/update.php')->only('Owner');
$router->get('/login', 'welcome.php');
$router->get('/accept', 'booking/response.php')->only('Owner');
$router->get('/reject', 'booking/response.php')->only('Owner');
$router->post('/return', 'booking/return.php')->only('Owner');
$router->get('/no_answer', 'booking/no_answer.php')->only('Owner');
// customer

$router->get('/signup', 'customers/signup.php');
$router->get('/rent', 'cars/rent.php')->only('Customer');
$router->post('/register', 'customers/register.php');
$router->get('/home', 'customers/home.php')->only('Customer');
$router->get('/upload_id', 'customers/uploads/upload_id.php')->only('Customer');
$router->post('/store_id', 'customers/uploads/store_id.php')->only('Customer');

$router->get('/upload_passport', 'customers/uploads/upload_passport.php')->only('Customer');
$router->post('/store_pass', 'customers/uploads/store_pass.php')->only('Customer');
$router->get('/upload_license', 'customers/uploads/upload_license.php')->only('Customer');
$router->post('/store_license', 'customers/uploads/store_license.php')->only('Customer');
$router->get('/time', 'customers/uploads/time.php')->only('Customer');

$router->post('/store_time', 'customers/uploads/store_time.php')->only('Customer');
$router->get('/payment_method', 'customers/uploads/payment_method.php')->only('Customer');
$router->post('/store_pay', 'customers/uploads/store_pay.php')->only('Customer');

$router->get('/send_email', 'customers/send_email.php')->only('Customer');

$router->get('/rent_request','booking/requests.php')->only('Customer');

$router->post('/store_rate', 'booking/store_rate.php')->only('Customer');

$router->get('/rate', 'booking/rate.php')->only('Customer');

$router->get('/ratings', 'booking/ratings.php')->only('Owner');
