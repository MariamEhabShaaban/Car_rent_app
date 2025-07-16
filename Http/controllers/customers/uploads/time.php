<?php


 
$token=$_GET['token'];

 require view("uploads/time.view.php",[
   'token'=>$token
 ]);
