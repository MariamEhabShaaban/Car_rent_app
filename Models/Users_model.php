<?php

namespace Models;
         
use Core\App;
use Core\validator;
class Users_model{

    public function add_user($email ,$password,$role,$token){


               $db = App::container()->resolve(\Core\Database::class);
               $res=$db->query('INSERT INTO users (`email`, `password` , `role`,`token`) VALUES (?,?,?,?)',[$email,$password,$role,$token]);
               return $res;
    }


    public function get_user_byEmail($email){

         $db = App::container()->resolve(\Core\Database::class);
         $user = $db->query('SELECT * FROM users WHERE email = ?', [$email])->find();

         return $user;

    }

   



  
}