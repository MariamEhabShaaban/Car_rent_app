<?php

namespace Core\Middleware;
class Customer{
      public function handle() {
        if(!isset($_SESSION['user']) || strtolower($_SESSION['role']) !== 'customer'){
           
           
                         abort('403');
                        exit;
                    }
    }
}