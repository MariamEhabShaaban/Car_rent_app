<?php


 $id= $_GET['car'];

 require view("uploads/passport.view.php",
 [
    'id'=>$id
 ]
);
