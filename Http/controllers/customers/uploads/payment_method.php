<?php


$token  = $_GET['token'];
require view("uploads/payment.view.php",[
    'token'=>$token
]);
