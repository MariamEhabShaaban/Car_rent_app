<?php

namespace Models;
         
use Core\App;
use Core\validator;
class Users_model{

    public function add_user($email ,$password,$role){


               $db = App::container()->resolve(\Core\Database::class);
               $res=$db->query('INSERT INTO users (`email`, `password` , `role`) VALUES (?,?,?)',[$email,$password,$role]);
               return $res;
    }

}