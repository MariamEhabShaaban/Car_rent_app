<?php



use Models\Booking_requests_model;

use Models\Cars_model;
use Core\App;
$db = App::container()->resolve(\Core\Database::class);
$request = new Booking_requests_model($db);
$car = new Cars_model($db);

$token = $_GET['token'] ?? null;


if (!$token) {
    abort('403');
}
$booking = $request->get_request($token);

if (!$booking) {
  
    abort('403');
}


if (check_expire($booking['token_expiry'])) {
    // update status to don't answer
    $update_status = $request->update_status($token, 'No_answer');
     if($update_status){
      
        redirect('/no_answer');
    }
    
}


if ($_SERVER['PATH_INFO'] === '/accept') {
       
    
    $update_status = $request->update_status($token, 'accepted');
// update car status to not available

    $update_car = $car->update_car_statusById($booking['car_id'],'Not_available');
    if($update_status && $update_car){
           
        redirect('/control_panel');
    }

} elseif ($_SERVER['PATH_INFO'] === '/reject') {
      

   $update_status = $request->update_status($token, 'rejected');
if($update_status){
       
    redirect('/control_panel');
}
}
