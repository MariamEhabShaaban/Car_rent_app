<?php

namespace Core;
use Core\validator;
use Models\Users_model;

class Authenticator


{

    private $db;
    protected $errors = [];

    private $email;
    private $password;

    private $confirm_pass;

    private $role = 'customer';

    protected $reg = true;
  public function __construct($db){
    $this->db=$db;
  }
    public function validate($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        if (!validator::string($this->email)) {
            $this->errors['email'] = 'Email is required';
            return;
        }

        if (!validator::email($this->email)) {
            $this->errors['email'] = 'Email is invalid';
            return;
        }

        if (!$this->unique($this->email)) {
            $this->errors['email'] = 'Email already registered';
            return;
        }

        if (!validator::string($this->password, 8)) {
            $this->errors['password'] = 'Password must be at least 8 characters';
            return;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function confirm_password($confirm_pass)
    {
        $this->confirm_pass = $confirm_pass;
        if (!password_verify($this->confirm_pass, $this->password) && empty($this->errors)) {

            $this->errors['password'] = 'Not match password';

        }


    }


    public function attemptLogin($email, $password): bool
    {
       
            $users = new Users_model($this->db);

        $user = $users->get_user_byEmail($email);


        if (!$user) {
            $this->errors['email'] = 'This Email is not found';
            return false;

        }

        if (!password_verify($password, $user['password'])) {
            $this->errors['password'] = 'Incorrect password';
            return false;
        }
        $this->role = $user['role'];
        $_SESSION['id']=$user['id'];
       

        return true;
    }


    public function login($email)
    {
        $_SESSION['user'] = [
            'email' => $email
        ];
        $_SESSION['role'] = $this->role;
        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }


    public function register()
    {  
          $token = bin2hex(random_bytes(16));
          $add_user = new Users_model($this->db);
          $this->reg = $add_user->add_user($this->email,$this->password,$this->role,$token);
        
           if($this->reg)
                 $_SESSION['register'] = 'Registed Successfully';
        return $this->reg;
    }


    public function unique($email)
    {
        
        $users = new Users_model($this->db);
        $duplicate = $users->get_user_byEmail($email);
        return !$duplicate;
    }


    public function error()
    {
        return $this->errors;
    }


}