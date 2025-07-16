<?php

namespace Models;
         

class Users_model{

    private $db;
    public function __construct($db){
        $this->db=$db;
    }

    public function add_user($email ,$password,$role,$token){


             
               $res=$this->db->query('INSERT INTO users (`email`, `password` , `role`,`token`) VALUES (?,?,?,?)',[$email,$password,$role,$token]);
               return $res?true:false;
    }


    public function get_user_byEmail($email){

        
         $user = $this->db->query('SELECT * FROM users WHERE email = ?', [$email])->find();

         return $user;

    }

   



  
}