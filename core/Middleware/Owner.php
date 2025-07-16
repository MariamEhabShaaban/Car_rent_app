<?php

namespace Core\Middleware;
class Owner{
       public function handle() {
        if(!isset($_SESSION['user']) || strtolower($_SESSION['role']) !== 'owner'){
           
           
                        header('location:/');
                        exit;
                    }
    }
}