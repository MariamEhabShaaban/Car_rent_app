<?php

namespace Core\Middleware;
class Customer{
      public function handle() {
         if($_SESSION['user']??false){
                        header('location:/');
                        exit;
                    }
    }
}