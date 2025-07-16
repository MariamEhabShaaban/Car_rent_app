<?php

 $token= $_GET['token'];


 require view("uploads/license.view.php",[
   'token'=>$token
 ]);
