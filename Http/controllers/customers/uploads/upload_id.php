<?php


 $id= $_GET['car'];

 require view("uploads/id.view.php",
 [
    'id'=>$id
 ]
);
