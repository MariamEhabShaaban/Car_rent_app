<?php


 $id= $_GET['car'];

 require view("uploads/time.view.php",
 [
    'id'=>$id
 ]
);
