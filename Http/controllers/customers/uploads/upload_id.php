<?php


 $token= $_GET['token'];

 require view("uploads/id.view.php",
 [
    'token'=>$token
 ]
);
