<?php

 $token= $_GET['token'];


 require view("uploads/passport.view.php",[
   'token'=>$token
 ]);

