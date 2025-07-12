<?php


 $id= $_GET['car'];

 require view("uploads/license.view.php",
 [
    'id'=>$id
 ]
);
