<?php


namespace Http\Forms;
use Core\validator;
class LoginForm{


   protected $errors=[];

   public function validate($email,$password)  {


    if(!validator::email($email)){
        $this->errors['email']='Enter a valid email';
    }

    if(!validator::string($password,7,255)){
        $this->errors['password']='password must be at least 7 chars';
    }

    return empty($this->errors);
        
   }

   public function errors(){
    return $this->errors;
   }

}